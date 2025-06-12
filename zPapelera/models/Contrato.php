<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos'; // Nombre de la tabla en la BD

    protected $primaryKey = 'id_contrato'; // Clave primaria
    public $timestamps = false;

    protected $fillable = [
        'doc_usuario',
        'fec_inicio',
        'fec_final',
        'salario',
        'condiciones',
        'id_estado_lab',
        'id_tip_contrato',
        'id_tiempo_cont',
        'id_estado_cont'
    ];

    // Relación con usuario basada en `doc_usuario`, no en `id`
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'doc_usuario', 'doc_usuario');
    }

    public function estadoLaboral()
    {
        return $this->belongsTo(EstadoLaboral::class, 'id_estado_laboral', 'id_estado_laboral');
    }

    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'id_tip_contrato', 'id_tip_contrato');
    }

    public function tiempoContrato()
    {
        return $this->belongsTo(TiempoContrato::class, 'id_tiempo_cont', 'id_tiempo_cont');
    }

    public function estadoContrato()
    {
        return $this->belongsTo(EstadoContrato::class, 'id_estado_lab', 'id_estado_lab');
    }
}

