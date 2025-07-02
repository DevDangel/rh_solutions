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
        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Nueva contraseña</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-contro @error('password') is-invalid @enderror"
                required
                placeholder="Ingrese su nueva contraseña"
                autocomplete="new-password"
            >
            <span id="eyeIconSpanPassword" style="cursor: pointer;">
                <i class="fa-solid fa-eye" id="eyeIconPassword"></i>
            </span>
        </div>

        {{-- Confirmar contraseña --}}
        <div class="mb-3 position-relative">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-contro"
                required
                placeholder="Confirme su contraseña"
                autocomplete="new-password"
            >
            <span id="eyeIconSpanConfirm" style="cursor: pointer;">
                <i class="fa-solid fa-eye" id="eyeIconConfirm"></i>
            </span>
            @csrf

        {{-- Bloque de errores personalizados de Laravel --}}
        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #842029; padding: 10px 15px; border-radius: 5px; border: 1px solid #f5c2c7; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        </div>

        <script>
            function toggleVisibility(inputId, iconId) {
                const input = document.getElementById(inputId);
                const icon = document.getElementById(iconId);
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            }

            // Asignar eventos a ambos campos
            document.getElementById('eyeIconPassword')?.addEventListener('click', () => {
                toggleVisibility('password', 'eyeIconPassword');
            });

            document.getElementById('eyeIconConfirm')?.addEventListener('click', () => {
                toggleVisibility('password_confirmation', 'eyeIconConfirm');
            });
        </script>

        {{-- Botón actualizar --}}
        <button type="submit" class="btn-custom mt-3 w-100">
            ACTUALIZAR CONTRASEÑA
        </button>

    </form>
</div>

@endsection
