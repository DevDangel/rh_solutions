<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidacionController extends Controller
{
    public function validarCampo(Request $request)
    {
        $request->validate([
            'campo' => 'required|in:num_documento,correo,celular',
            'valor' => 'required|string|max:255',
        ]);

        $campo = $request->input('campo');
        $valor = trim($request->input('valor'));

        $mapaCampos = [
            'num_documento' => 'doc_usuario',
            'correo' => 'correo_usuario',
            'celular' => 'cel_usuario',
        ];

        $columna = $mapaCampos[$campo];

        $exists = DB::table('usuarios')
            ->where($columna, $valor)
            ->exists();

        return response()->json(['exists' => $exists]);
    }

    public function validarCelular(Request $request)
    {
        $celular = $request->input('celular');

        // Verificar si ya existe en la tabla usuarios (columna cel_usuario)
        $existe = DB::table('usuarios')->where('cel_usuario', $celular)->exists();

        return response()->json(['existe' => $existe]);
    }
}

