<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('login'); // Asegúrate de que esta vista esté en resources/views/login.blade.php
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
