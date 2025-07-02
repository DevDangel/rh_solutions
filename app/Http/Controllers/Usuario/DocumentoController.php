<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocumentosRequeridos;
use App\Models\Documento;

class DocumentoController extends Controller
{
    public function index()
{
    $usuario = auth('usuario')->user();

    // Documentos que debe subir
    $documentosRequeridos = DocumentosRequeridos::where('id_cargo', $usuario->id_cargo)
                            ->with('tipoDocumento')
                            ->get();

    // Documentos que ya subió
    $documentosSubidos = Documento::where('id_usuario', $usuario->id_usuario)->get();

    return view('user.documentos', compact('documentosRequeridos', 'documentosSubidos'));
}

public function upload(Request $request)
{
    $request->validate([
        'id_tip_document' => 'required',
        'nom_documento' => 'required',
        'archivo' => ['required', 'file', 'max:5120', function ($attribute, $value, $fail) use ($request) {
            $tipo = $request->id_tip_document;
            $extension = $value->getClientOriginalExtension();

            if ($tipo == 1 && $extension != 'pdf') {
                $fail('Solo se permite subir archivos PDF para este documento.');
            } elseif ($tipo == 2 && !in_array($extension, ['doc', 'docx'])) {
                $fail('Solo se permite subir archivos Word para este documento.');
            } elseif ($tipo == 3 && !in_array($extension, ['xls', 'xlsx'])) {
                $fail('Solo se permite subir archivos Excel para este documento.');
            }
        }],
        'fecha_vencimiento' => 'nullable|date'
    ]);

    $usuario = auth('usuario')->user();
    $archivo = $request->file('archivo');
    $ruta = $archivo->store('documentos', 'public');

    Documento::create([
        'nom_documento' => $request->nom_documento,
        'ruta_archivo' => $ruta,
        'fecha_vencimiento' => $request->fecha_vencimiento,
        'serial_unico' => uniqid(),
        'estado' => 'Cargado',
        'id_usuario' => $usuario->id_usuario,
        'id_tip_document' => $request->id_tip_document
    ]);

    return redirect()->back()->with('success', 'Documento subido correctamente.');
}

public function eliminar($id)
{
    $documento = Documento::findOrFail($id);
    $documento->delete();

    return redirect()->back()->with('success', 'Documento eliminado correctamente.');
}

public function actualizarFecha(Request $request, $id)
{
    $request->validate([
        'fecha_vencimiento' => 'required|date'
    ]);

    $documento = Documento::findOrFail($id);
    $documento->update([
        'fecha_vencimiento' => $request->fecha_vencimiento
    ]);

    return redirect()->back()->with('success', 'Fecha de expiración actualizada correctamente.');
}


}
