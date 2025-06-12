<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $mensaje;
    public $pdfPaths;

    /**
     * Create a new message instance.
     */
    public function __construct($usuario, $mensaje, $pdfPaths)
    {
        $this->usuario = $usuario;
        $this->mensaje = $mensaje;
        $this->pdfPaths = (array) $pdfPaths; // Asegura que siempre sea array
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $correo = $this->subject('Solicitud Aprobada - Certificados Adjuntos')
                       ->view('emails.certificadoMensaje') // NUEVA vista profesional
                       ->with([
                           'usuario' => $this->usuario,
                           'mensaje' => $this->mensaje
                       ]);

        // Adjuntar los PDF(s)
        foreach ($this->pdfPaths as $pdfPath) {
            $correo->attach($pdfPath, [
                'as' => basename($pdfPath),
                'mime' => 'application/pdf',
            ]);
        }

        return $correo;
    }
}

