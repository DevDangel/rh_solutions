<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\TipoDocumento;
use App\Models\DocumentosRequeridos;

class DocumentoAsignacionController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        $tiposDocumentos = TipoDocumento::all();
        $documentosAsignados = DocumentosRequeridos::with('cargo')->get();

        return view('admin.asignarDocumentos', compact('cargos', 'tiposDocumentos', 'documentosAsignados'));
    }

    public function asignarDocumentos(Request $request)
    {
        $request->validate([
            'id_cargo' => 'required',
            'id_tip_document' => 'required',
            'nom_documento' => 'required',
        ]);

        $documento = DocumentosRequeridos::create([
            'id_cargo' => $request->id_cargo,
            'id_tip_document' => $request->id_tip_document,
            'nom_documento' => $request->nom_documento,
            'obligatorio' => $request->has('requiere_fecha') ? 1 : 0,
            'create_at' => now(),
        ]);

        return redirect()->route('admin.documentos.index')->with('success', 'Documento asignado correctamente.');

    }

    public function eliminarDocumento($id)
    {
        $documento = DocumentosRequeridos::findOrFail($id);
        $documento->delete();

        return redirect()->back()->with('success', 'Documento eliminado correctamente.');
    }

    public function actualizarDocumento(Request $request, $id)
    {
        $request->validate([
            'nom_documento' => 'required',
        ]);

        $documento = DocumentosRequeridos::findOrFail($id);
        $documento->nom_documento = $request->nom_documento;
        $documento->obligatorio = $request->has('requiere_fecha') ? 1 : 0;
        $documento->save();

        return redirect()->back()->with('success', 'Documento actualizado correctamente.');
    }
}
