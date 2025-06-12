<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificados Adjuntos</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f5f7fa; color: #333;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f5f7fa; padding: 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 5px rgba(0,0,0,0.1); padding: 30px;">
                    <tr>
                        <td style="text-align: center; padding-bottom: 20px;">
                            <h2 style="margin: 0; color: #2c3e50;">Certificado Laboral</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 15px; font-size: 16px;">
                            <p style="margin: 0;">Hola <strong>{{ $usuario->pri_nombre }}</strong>,</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 15px; font-size: 16px;">
                            <p style="margin: 0;">{{ $mensaje }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px; font-size: 16px;">
                            <p style="margin: 0;">Adjuntamos tu certificado laboral en formato PDF. Puedes descargarlo desde los archivos adjuntos de este correo.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <p style="margin: 30px 0 10px; font-size: 14px; color: #7f8c8d;">Saludos cordiales,<br><strong>Equipo de Talento Humano</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size: 12px; color: #bdc3c7; padding-top: 20px;">
                            <p style="margin: 0;">Este correo fue enviado automáticamente. Por favor, no respondas a esta dirección.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
