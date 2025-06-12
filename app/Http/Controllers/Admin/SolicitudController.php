<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SolicitudCertificado;
use App\Models\HistorialCertificado;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificadoMail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SolicitudController extends Controller
{
    //
    public function view() {
        $solicitudes = SolicitudCertificado::with(['contrato.usuario', 'contrato.tipoContrato'])
                        ->orderBy('id_solicitud', 'asc')
                        ->get();

        return view('admin.solicitudes', compact('solicitudes'));
    }
    public function generarCertificado(Request $request) {
        $solicitud = SolicitudCertificado::findOrFail($request->id_solicitud);
        $contrato = $solicitud->contrato; // Obtener el contrato relacionado
        // validar si existe certificado
        $existeHistorial = HistorialCertificado::where('id_contrato',$contrato ->id_contrato)->exists();
        if ($existeHistorial) {
            return response()->json(['error' => '❌ Este contrato ya tiene un certificado en el historial.'], 409);
        }
        // Guardar los datos en historial_certificados
        HistorialCertificado::create([
            'id_contrato' => $contrato->id_contrato, //
            'motivo' => $solicitud->motivo, //
        ]);

        return response()->json(['success' => true]);
    }
    public function enviarCertificado(Request $request){
        try{
            $solicitud = SolicitudCertificado::findOrFail($request->id_solicitud);
            $usuario = $solicitud->contrato->usuario;

            $nombreCompleto = "{$usuario->pri_nombre} {$usuario->seg_nombre} {$usuario->pri_apellido} {$usuario->seg_apellido}";
            $docUsuario = $usuario->doc_usuario;

            $estadoLaboral = $solicitud->contrato->fec_finalizacion === null ? 'Labora' :
            ($solicitud->contrato->fec_finalizacion < now('America/Bogota') ? 'Laboró' : 'Labora');
            
            $cargo = $usuario->cargo ? $usuario->cargo->cargo : 'Sin cargo registrado';
            $tipoContrato = $solicitud->contrato->tipoContrato->nom_contrato ?? 'Sin tipo de contrato';
            $tiempoContrato = $solicitud->contrato->tiempoContrato->nom_tiemp_contrato ?? 'Sin tiempo de contrato';
            $salario = $solicitud->contrato->salario ?? 'Sin salario registrado';
            $fecha = Carbon::parse($solicitud->contrato->fec_ingreso)->format('d/m/Y');
            $dia = Carbon::now()->format('d');
            $mes = Carbon::now()->translatedFormat('F');
            $año = Carbon::now()->format('Y');

            // Generar el PDF usando la plantilla del certificado
            $pdf = Pdf::loadView('admin.certificado', compact(
                'nombreCompleto', 'docUsuario', 'estadoLaboral',
                'cargo', 'tipoContrato', 'tiempoContrato', 'salario', 'fecha',
                'dia', 'mes', 'año'
            ));

            $pdfPath = 'certificados/certificado_' . str_replace(' ', '_', strtolower($nombreCompleto)) . '.pdf';
            Storage::makeDirectory('certificados');
            Storage::put($pdfPath, $pdf->output());

            if (!Storage::exists($pdfPath)) {
                return response()->json(['error' => 'Error al generar el certificado.'], 500);
            }

            // Enviar correo
            $mensaje = 'Se adjunta el certificado laboral solicitado.';
            Mail::to($usuario->correo_usuario)->send(new CertificadoMail($usuario, $mensaje, [Storage::path($pdfPath)]));

            return response()->json(['success' => true]);
        }catch(\Exception $e){
             return response()->json(['error' => $e->getMessage()], 500);
        }
    }


}
