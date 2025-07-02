<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Usuario;

class PasswordResetController extends Controller
{
    public function showRequestForm()
    {
        return view('auth.passwords.request');
    }

    public function sendCode(Request $request)
    {
        $request->validate([
            'cedula' => 'required|string'
        ]);

        $cedula = $request->cedula;

        // Buscar usuario por cédula
        $user = Usuario::where('doc_usuario', $cedula)->first();
        $email = $user?->correo_usuario;

        if (!$user || !$email) {
            return back()->with('status', 'El usuario no se encuentra registrado.')->withInput();
        }

        $token = rand(100000, 999999);

        // Insertar o actualizar token usando email
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => $token,
                'created_at' => Carbon::now(),
            ]
        );

        session([
            'cedula' => $cedula,
            'email' => $email,
            'status' => 'Se ha enviado un código de recuperación a tu correo.'
        ]);

        $this->configureSMTP($user);

        Mail::send('auth.passwords.email', ['token' => $token, 'user' => $user], function ($message) use ($email) {
            $message->to($email)->subject('Código de restablecimiento de contraseña');
        });

        return redirect()->route('password.verify');
    }

    private function configureSMTP($user)
    {
        if (
            $user &&
            $user->smtp_host && $user->smtp_port &&
            $user->smtp_username && $user->smtp_password &&
            $user->smtp_from_address && $user->smtp_from_name
        ) {
            config([
                'mail.mailers.smtp.host' => $user->smtp_host,
                'mail.mailers.smtp.port' => $user->smtp_port,
                'mail.mailers.smtp.username' => $user->smtp_username,
                'mail.mailers.smtp.password' => $user->smtp_password,
                'mail.mailers.smtp.encryption' => $user->smtp_encryption ?? null,
                'mail.from.address' => $user->smtp_from_address,
                'mail.from.name' => $user->smtp_from_name,
            ]);
        }
    }

    public function showVerifyForm()
    {
        return view('auth.passwords.verify', [
            'cedula' => session('cedula'),
            'status' => session('status'),
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'cedula' => 'required|string',
            'token' => 'required'
        ]);

        $user = Usuario::where('doc_usuario', $request->cedula)->first();

        if (!$user) {
            return back()->withErrors(['cedula' => 'Usuario no encontrado.']);
        }

        $email = $user->correo_usuario;

        $reset = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('token', $request->token)
            ->where('created_at', '>=', Carbon::now()->subMinutes(20))
            ->first();

        if (!$reset) {
            session()->forget('status'); // Elimina el mensaje verde
            return back()->withErrors(['token' => 'Código inválido o expirado.']);
        }

        session(['cedula' => $request->cedula, 'email' => $email]);

        return redirect()->route('password.change');
    }

    public function showChangeForm()
    {
        $identificacion = session('cedula');

        if (!$identificacion) {
            return redirect()->route('password.request')->withErrors(['error' => 'Sesión inválida.']);
        }

        return view('auth.passwords.change', compact('identificacion'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => [
            'required',
            'confirmed',
            'min:8',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&.]).+$/', // al menos un carácter especial
            ],

            ], [

                'password.regex' => 'La contraseña debe contener al menos una mayúscula, una minúscula, un número y un símbolo.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                'password.confirmed' => 'Las contraseñas no coinciden.',

        ]);

        $user = Usuario::where('doc_usuario', $request->identificacion)->first();

        if (!$user) {
            return back()->withErrors(['identificacion' => 'No se encontró el usuario.']);
        }

        $user->contraseña = Hash::make($request->password);
        $user->save();

        DB::table('password_reset_tokens')
            ->where('email', $user->correo_usuario)
            ->delete();

        session()->forget(['cedula', 'email']);

        Mail::send('auth.passwords.passwordUpdated', [], function ($message) use ($user) {
            $message->to($user->correo_usuario)
            ->subject('Tu contraseña ha sido actualizada');
        });

        return redirect('/')->with('status', 'Contraseña actualizada correctamente.');
    }

}
