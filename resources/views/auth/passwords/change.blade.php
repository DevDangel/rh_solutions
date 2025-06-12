@extends('layouts')

@section('title', 'Cambiar contraseña')

@section('content')

<div class="d-flex justify-content-center align-items-center mt-5">
    <form
        method="POST"
        action="{{ route('password.update') }}"
        class="form-content"
        style="background-color: #f4f6fc; border-radius: 8px; padding: 40px; max-width: 450px; width: 100%;"
    >
        @csrf

        {{-- Logo --}}
        <div class="text-center mb-4">
            <img src="{{ asset('imgs/rh19.png') }}" alt="Logo empresa" class="imagen-arriba" style="width: 150px;">
        </div>

        <div class="text-center mb-4">
            <h4>Cambiar contraseña</h4>
        </div>

        {{-- Inputs ocultos para identificar usuario --}}
        <input type="hidden" name="identificacion" value="{{ $identificacion }}">


        {{-- Contraseña nueva --}}
        <div class="mb-3">
            <label for="password" class="form-label">Nueva contraseña</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-contro @error('password') is-invalid @enderror"
                required
                minlength="6"
                placeholder="Ingrese su nueva contraseña"
                autocomplete="new-password"
            >
            @error('password')
            <div class="invalid-feedback" role="alert" style="color: red; font-size: 14px;">
                {{ __('Las contraseñas no coinciden.') }}
            </div>
            @enderror

        </div>

        {{-- Confirmar contraseña --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-contro"
                required
                minlength="6"
                placeholder="Confirme su contraseña"
                autocomplete="new-password"
            >
        </div>

        {{-- Botón actualizar --}}
        <button type="submit" class="btn-custom mt-3 w-100">
            ACTUALIZAR CONTRASEÑA
        </button>
    </form>
</div>

@endsection
