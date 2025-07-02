<!DOCTYPE html>
<html>
<head>
    <title>Contraseña Actualizada</title>
    <meta charset="UTF-8">
    <style>
        body {
            background: #f0f2f5;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            background: #ffffff;
            max-width: 480px;
            margin: 60px auto;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            padding: 40px 45px;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo img {
            max-width: 100px;
        }
        .message {
            color: #2c2c2c;
            font-size: 17px;
            text-align: center;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        .highlight {
            background: #e6f4ea;
            color: #155724;
            font-size: 15px;
            font-weight: 500;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid #c3e6cb;
        }
        .footer {
            color: #6c757d;
            font-size: 13px;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('imgs/rh19.png') }}" alt="Logo RH Solutions">
        </div>
        <div class="message">
            <p><strong>¡Hola!</strong></p>
            <p>Te informamos que tu contraseña fue modificada con éxito.</p>
        </div>
        <div class="highlight">
            Si no realizaste este cambio, por favor comunícate con el equipo de soporte inmediatamente.
        </div>
        <div class="footer">
            © {{ date('Y') }} RH Solutions. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
