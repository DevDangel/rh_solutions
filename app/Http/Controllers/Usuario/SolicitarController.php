<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\SolicitudCertificado;
use Illuminate\Support\Facades\Auth;

class SolicitarController extends Controller
{
    //
    public function listarContratos() {
        $usuarioId = Auth::user()->id_usuario;
        // Obtener contratos del usuario
        $contratos = Contrato::where('id_usuario', $usuarioId)
                    ->with(['tipoContrato'])
                    ->orderBy('fec_ingreso', 'desc')
                    ->get();
        // Obtener solicitudes en la última hora
        $solicitudesRecientes = SolicitudCertificado::whereIn('id_contrato', $contratos->pluck('id_contrato'))
                          ->pluck('id_contrato')
                          ->toArray();
        return view('user.solicitar', compact('contratos', 'solicitudesRecientes'));
    }
    
    public function guardarSolicitud(Request $request){
        $contratos = json_decode($request->contratos_seleccionados, true);
        $motivos = json_decode($request->motivos, true);

        if (empty($contratos)) {
            return redirect()->back()->with('error', '❌ Debes seleccionar al menos un contrato.');
        }

        foreach ($contratos as $id_contrato) {
            SolicitudCertificado::create([
                'id_contrato' => $id_contrato,
                'motivo' => $motivos[$id_contrato] ?? '',
            ]);
        }

        return redirect()->back()->with('success', '✅ Solicitud enviada con éxito.');
    }


}
