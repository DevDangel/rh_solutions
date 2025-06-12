<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudCertificado extends Model
{
    use HasFactory;

    protected $table = 'solicitud_certificado';
    protected $primaryKey = 'id_solicitud';
    public $timestamps = false; // No tiene `created_at` ni `updated_at`

    protected $fillable = ['id_contrato', 'motivo'];

    // Relación con contratos
    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'id_contrato', 'id_contrato');
    }
}
