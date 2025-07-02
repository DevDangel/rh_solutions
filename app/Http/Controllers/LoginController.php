<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        // Validación
        $request->validate([
            'doc_usuario' => 'required',
            'password' => 'required'
        ]);

        // Buscar al usuario por documento
        $user = Usuario::where('doc_usuario', $request->doc_usuario)->first();

        // Verificar credenciales
        if ($user && Hash::check($request->password, $user->contraseña)) {
            if ($user->id_cargo != 1) {// Usuario: login con guard 'usuario'
                Auth::guard('usuario')->login($user);
                return redirect()->route('usuario.dashboard');

            } else {// Admin: login con guard 'admin'
                Auth::guard('admin')->login($user);
                return redirect()->route('admin.dashboard');
            }

        }else{
            return back()
            ->withErrors(['login'=>'Usuario o contraseña incorrecta'])
            ->withInput();
        }
    }
}
