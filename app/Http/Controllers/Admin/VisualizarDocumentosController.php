<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use App\Models\Usuario;


class VisualizarDocumentosController extends Controller{

    public function visualizarDocumentos()
{
    $documentos = Documento::with(['usuario', 'tipoDocumento'])->get();

    return view('admin.visualizacionDocumentos', compact('documentos'));
}

}


