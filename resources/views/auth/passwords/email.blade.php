<!DOCTYPE html>
<html>
<head>
    <title>Restablecer Contraseña</title>
    <meta charset="UTF-8">
    <style>
        body {
            background: #f6f8fa;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container {
            background: #fff;
            max-width: 450px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 30px 35px;
        }
        .logo {
            text-align: center;
            margin-bottom: 25px;
        }
        .logo img {
            max-width: 120px;
        }
        .message {
            color: #222;
            font-size: 16px;
            margin-bottom: 15px;
            text-align: center;
        }
        .code {
            background: #f0f4f8;
            color: #2563eb;
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 4px;
            text-align: center;
            padding: 16px 0;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #e0e7ef;
        }
        .footer {
            color: #888;
            font-size: 13px;
            text-align: center;
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="http://rh_solutions.test/imgs/rh19.png" alt="Logo">
        </div>
        <div class="message">
            <p>Has solicitado restablecer tu contraseña.</p>
            <p>Tu código de recuperación es:</p>
        </div>
        <div class="code">
            {{ $token }}
        </div>
        <div class="message">
            <p>Este código expirará en 20 minutos.</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} RH Solutions. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
