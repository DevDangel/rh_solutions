<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contrato;
use App\Models\Usuario;
use App\Models\TipoContrato;
use App\Models\TiempoContrato;
use App\Models\EstadoContrato;
use App\Models\EstadoLaboral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;



class ContratoController extends Controller
{
    // Mostrar todos los contratos
    public function view() {
        $contratos = Contrato::with(['usuario', 'tipoContrato', 'tiempoContrato', 'estadoContrato'])
                    ->orderBy('id_contrato', 'asc')
                    ->get();

        $tiposContrato = TipoContrato::orderBy('id_tip_contrato')->get();
        $tiemposContrato = TiempoContrato::orderBy('id_tiemp_contrato')->get();
        $estadoContrato = EstadoContrato::orderBy('id_est_contrato')->get();

        return view('admin.contratos', compact('contratos', 'tiposContrato', 'tiemposContrato', 'estadoContrato'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'doc_usuario' => 'required|numeric|digits_between:7,10|exists:usuarios,doc_usuario',
            'id_tip_contrato' => 'required|exists:tipo_contrato,id_tip_contrato',
            'id_tiempo_cont' => 'required|exists:tiempo_contrato,id_tiemp_contrato',
            'fec_inicio' => 'required|date',
            'fec_final' => 'nullable|date|after_or_equal:fec_inicio',
            'salario' => 'required|numeric|min:0|max:99999999',
            'id_estado_cont' => 'required|exists:estado_contrato,id_est_contrato',
            'funciones' => 'nullable|string|max:1000',
            'clausulas' => 'nullable|string|max:1000'
        ], [
            'doc_usuario.exists' => 'El documento no está registrado en el sistema',
            'fec_final.after_or_equal' => 'La fecha final debe ser igual o posterior a la de inicio'
        ]);

        try {
            //ponte trucha we esto lo que hace es compara el documento ingresado en el formulario lo compara con el doc_usuario de la tabla usuarios si es igual inserta el
            //id del documento que corresponda o sea igual ponte trucha
            $usuario = Usuario::where('doc_usuario', $validatedData['doc_usuario'])->firstOrFail();
           // dd($usuario); // Antes del create(), verifica que el usuario se haya encontrado
            Contrato::create([
                'fec_ingreso' => $validatedData['fec_inicio'],
                'fec_finalizacion' => $validatedData['fec_final'],
                'funciones' => $validatedData['funciones'],
                'salario' => $validatedData['salario'],
                'clausulas' => $validatedData['clausulas'],
                'id_tip_contrato' => $validatedData['id_tip_contrato'],
                'id_usuario' => $usuario->id_usuario,
                'id_tiemp_contrato' => $validatedData['id_tiempo_cont'],
                'id_est_contrato' => $validatedData['id_estado_cont']
            ]);

            return redirect()
                   ->route('admin.contratos')
                   ->with('success', 'Contrato creado exitosamente para '.$usuario->nombre);

        } catch (\Exception $e) {
            return redirect()
                   ->back()
                   ->withInput()
                   ->with('error', 'Error al crear contrato: '.$e->getMessage());
        }
    }

     // Mostrar datos para editar (llamado via AJAX) en los inputs
    public function edit($id){
        $contrato = Contrato::with(['usuario', 'tipoContrato', 'tiempoContrato', 'estadoContrato'])
                    ->findOrFail($id);

        $tiposContrato = TipoContrato::orderBy('id_tip_contrato')->get();
        $tiemposContrato = TiempoContrato::orderBy('id_tiemp_contrato')->get();
        $estadoContrato = EstadoContrato::orderBy('id_est_contrato')->get();
        // Obtener nombre y apellido completo del usuario
        $nombre = trim("{$contrato->usuario->pri_nombre} {$contrato->usuario->seg_nombre}");
        $apellido = trim("{$contrato->usuario->pri_apellido} {$contrato->usuario->seg_apellido}");
        return response()->json([
            'contrato' => $contrato,
            'tipos' => $tiposContrato,
            'tiempos' => $tiemposContrato,
            'estados' => $estadoContrato,
            'nombre_completo' =>$nombre,
            'apellido_completo' => $apellido
        ]);
    }
    // Actualizar contrato existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'doc_usuario' => 'required|numeric|digits_between:7,10|exists:usuarios,doc_usuario',
            'id_tip_contrato' => 'required|exists:tipo_contrato,id_tip_contrato',
            'id_tiempo_cont' => 'required|exists:tiempo_contrato,id_tiemp_contrato',
            'fec_inicio' => 'required|date',
            'fec_final' => 'nullable|date|after_or_equal:fec_inicio',
            'salario' => 'required|numeric|min:0|max:99999999',
            'id_estado_cont' => 'required|exists:estado_contrato,id_est_contrato',
            'funciones' => 'nullable|string|max:1000',
            'clausulas' => 'nullable|string|max:1000'
        ], [
            'doc_usuario.exists' => 'El documento no está registrado en el sistema',
            'fec_final.after_or_equal' => 'La fecha final debe ser igual o posterior a la de inicio'
        ]);
        try {
            $contrato = Contrato::findOrFail($id);
            $usuario = Usuario::where('doc_usuario', $validated['doc_usuario'])->firstOrFail();

            $contrato->update([
                'fec_ingreso' => $validated['fec_inicio'],
                'fec_finalizacion' => $validated['fec_final'],
                'funciones' => $validated['funciones'],
                'salario' => $validated['salario'],
                'clausulas' => $validated['clausulas'],
                'id_tip_contrato' => $validated['id_tip_contrato'],
                'id_usuario' => $usuario->id_usuario,
                'id_tiemp_contrato' => $validated['id_tiempo_cont'],
                'id_est_contrato' => $validated['id_estado_cont']
            ]);

            return redirect()->route('admin.contratos')->with('success', 'Contrato actualizado exitosamente!');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error al actualizar contrato: ' . $e->getMessage());
        }
    }
    public function delete($id){
        try {
            $contrato = Contrato::findOrFail($id);
            $contrato->delete();

            return redirect()->route('admin.contratos')->with('success', 'Contrato eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('admin.contratos')->with('error', 'Error al eliminar contrato: ' . $e->getMessage());
        }
    }
    public function verificarDocumento(Request $request){
        $usuario =Usuario::where('doc_usuario', $request -> doc_usuario) ->first();
        if($usuario){
            return response() -> json([
                'existe' =>true,
                'nombre_completo' => trim("{$usuario->pri_nombre} {$usuario ->seg_nombre}"),
                'apellido_completo' => trim("{$usuario->pri_apellido} {$usuario ->seg_apellido}")
            ]);
        }else{
            return response() -> json(['existe',false]);
        }
    }


}
