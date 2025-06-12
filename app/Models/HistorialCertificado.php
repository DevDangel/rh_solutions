<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialCertificado extends Model
{
    protected $table = 'historial_certificados'; // Nombre correcto de la tabla
    protected $primaryKey = 'id_certificado'; // Clave primaria
     // Utilizar `created_at`
    public $timestamps = false; //Laravel solo manejará `created_at`

    protected $fillable = [
        'id_contrato',
        'motivo'
    ];

    // Relación con el contrato
    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'id_contrato', 'id_contrato');
    }
}
