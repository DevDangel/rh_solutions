<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistorialCertificado;
use App\Models\Contrato;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Barryvdh\DomPDF\Facade\Pdf;

class HistorialController extends Controller
{
    //
    public function view() {
        $certificados = HistorialCertificado::with(['contrato.usuario', 'contrato.tipoContrato'])
            ->orderBy('id_certificado', 'desc')
            ->get();

        return view('admin.historialCertificados', compact('certificados'));
    }

    public function verCertificado($id_contrato) {
        $contrato = Contrato::findOrFail($id_contrato);
        $usuario = $contrato->usuario;

        // Preparar los datos para la vista
        $nombreCompleto = "{$usuario->pri_nombre} {$usuario->seg_nombre} {$usuario->pri_apellido} {$usuario->seg_apellido}";
        $docUsuario = $usuario->doc_usuario;
        $estadoLaboral = $contrato->fec_finalizacion === null ? 'Labora':
        ($contrato->fec_finalizacion < now('America/Bogota') ? 'Laboró' : 'Labora');
        $cargo = $usuario->cargo ? $usuario->cargo->cargo : 'Sin cargo registrado';
        $tipoContrato = $contrato->tipoContrato ? $contrato->tipoContrato->nom_contrato : 'Sin tipo de contrato';
        $tiempoContrato = $contrato->tiempoContrato ? $contrato->tiempoContrato->nom_tiemp_contrato : 'Sin tiempo de contrato';
        $salario = $contrato->salario ?? 'Sin salario registrado';
        $fecha = Carbon::parse($contrato->fec_ingreso)->format('d/m/Y');
        Carbon::setLocale('es');
        $dia = Carbon::now()->format('d');
        $mes = Carbon::now()->translatedFormat('F');
        $año = Carbon::now()->format('Y');

        // Generar el PDF
        $pdf = Pdf::loadView('admin.certificado', compact(
            'contrato', 'nombreCompleto', 'docUsuario', 'estadoLaboral',
            'cargo', 'tipoContrato', 'tiempoContrato', 'salario', 'fecha',
            'dia', 'mes', 'año'
        ));

        // 🔥 Abrir el PDF en otra ventana
        return $pdf->stream("Certificado_Contrato_{$nombreCompleto}.pdf");
    }
}
