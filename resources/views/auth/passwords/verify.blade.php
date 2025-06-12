@extends('layouts')

@section('content')

<div class="d-flex justify-content-center align-items-center mt-5">
    <form
        method="POST"
        action="{{ route('password.reset') }}"
        class="form-content"
        style="background-color: #f4f6fc; border-radius: 8px; padding: 40px; max-width: 450px; width: 100%;"
    >
        @csrf

        {{-- Logo --}}
        <div class="text-center mb-4">
            <img src="{{ asset('imgs/rh19.png') }}" alt="Logo empresa" class="imagen-arriba" style="width: 150px;">
        </div>

        <div class="text-center mb-4">
            <h4>Verificar código de recuperación</h4>
        </div>

        @if(session('status'))
            <div class="error-message" style="background-color: #d4edda; color: #155724;">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->has('token'))
            <div class="error-message">
                {{ $errors->first('token') }}
            </div>
        @endif

        {{-- Cédula y tipo ocultos para enviar al resetPassword --}}
        <input type="hidden" name="cedula" value="{{ $cedula }}">

        <div class="mb-3">
            <label for="token" class="form-label">Código de recuperación</label>
            <input
                id="token"
                type="text"
                name="token"
                class="form-contro ('token')  "
                required
                autofocus
                maxlength="6"
                pattern="\d{6}"
                title="Ingrese el código de 6 dígitos"
                placeholder="Ejemplo: 123456"
                value="{{ old('token') }}"
            >
            @error('token')
                <span class="invalid-feedback" role="alert" style="color: red; font-size: 14px;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Botón para enviar el código --}}
        <button type="submit" class="btn-custom mt-3">
            VERIFICAR CÓDIGO
        </button>
    </form>
</div>

@endsection
