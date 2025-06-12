<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contrato';
    protected $primaryKey = 'id_contrato';
    public $timestamps = false; // descativar las tablas create_at y update_at
    protected $fillable = [
        'fec_ingreso',
        'fec_finalizacion',
        'funciones',
        'salario',
        'clausulas',
        'id_tip_contrato',
        'id_usuario',
        'id_tiemp_contrato',
        'id_est_contrato'
    ];
    // para poder despues calcular fechas y asi xd
    protected $casts = [
        'fec_ingreso' => 'date',
        'fec_finalizacion' => 'date',
        'salario' => 'decimal:2'
    ];

    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'id_tip_contrato','id_tip_contrato');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario','id_usuario');
    }

    public function tiempoContrato()
    {
        return $this->belongsTo(TiempoContrato::class, 'id_tiemp_contrato','id_tiemp_contrato');
    }

    public function estadoContrato()
    {
        return $this->belongsTo(EstadoContrato::class, 'id_est_contrato','id_est_contrato');
    }
}
