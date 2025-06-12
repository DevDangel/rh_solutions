<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <!-- CSS externo -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- CSS ONLY -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- enlace a FontAwesome para el ojo de visibilidad de la contraseña -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-container">
        <div class="form-container">
            <div class="form-content">
                <img src="{{ asset('imgs/rh19.png') }}" alt="Descripción de la imagen" class="imagen-arriba img-fluid">
                <h3 class="text-left text-dark">TU SOFTWARE DE RECURSOS HUMANOS</h3>

                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div>
                        <label for="exampleInputCedula" class="form-label">Usuario</label>
                        <input type="text" class="form-contro" name="doc_usuario" id="exampleInputCedula" required
                            pattern="^[0-9]{7,10}$" title="El numero debe contener entre 7 y 10 dígitos."
                            placeholder="Ingrese el usuario" value="{{ old('doc_usuario') }}">
                    </div>

                    <div class="password-container">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-contro" name="password" id="exampleInputPassword1"
                            required aria-label="Contraseña" title="Ingresa la contraseña.">
                        <span id="eyeIconSpan" style="display: none;">
                            <i class="fa-solid fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>

                    <a href="{{ route('password.request') }}" class="text-secondary">¿Olvidaste tu contraseña?</a>

                    <!-- Mostrar mensaje de error de validación -->
                    @if ($errors->any())
                        <div class="error-message">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Mostrar mensaje de sesión (flash) -->
                    @if (session('error'))
                        <div class="error-message">
                            {{ session('error') }}
                        </div>
                    @endif

                    <button type="submit" class="btn-custom" name="btningresar" value="Ok">INICIAR SESION</button>
                </form>
            </div>
        </div>

        <div class="image-container">
            <div class="decorative-bar"></div>
            <div class="decorative-bar-2"></div>
            <img src="{{ asset('imgs/rh14.jpg') }}" alt="Descripción de la imagen" class="imagen-grande img-fluid">
        </div>
    </div>

    <!-- JavaScript bundle with popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/login.js')}}"></script>
</body>
</html>
