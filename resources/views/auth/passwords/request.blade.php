@extends('layouts')

@section('title', 'Recuperar contraseña')

@section('content')

<div class="d-flex justify-content-center align-items-center mt-5">
    <form
        action="{{ route('password.sendCode') }}"
        method="POST"
        class="form-content" {{-- Usa la clase que tienes para formulario --}}
        style="background-color: #f4f6fc; border-radius: 8px; padding: 40px; max-width: 450px; width: 100%;"
    >
        @csrf

        <div class="text-center mb-4">
            <img src="{{ asset('imgs/rh19.png') }}" alt="Logo Empresa" class="mb-3 imagen-arriba" style="max-width: 150px;">
            <h4>Recuperación de contraseña</h4>
            <p>¿Recordaste tu contraseña? <a href="{{ route('login') }}">Ingresa aquí</a></p>
        </div>

        @if (session('status'))
            <div class="error-message">
                {{ session('status') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="cedula" class="form-label">Ingresa tu cédula</label>
            <input
                type="text"
                name="cedula"
                id="cedula"
                class="form-contro" {{-- tu clase personalizada --}}
                placeholder="Tu número de cédula"
                required
                pattern="[0-9]{7,15}"
                title="Ingresa solo números, entre 7 y 15 dígitos"
                autocomplete="off"
            >
        </div>

        <button type="submit" class="btn-custom">ENVIAR CÓDIGO</button>
    </form>
</div>

@endsection
