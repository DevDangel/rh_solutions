<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoContrato extends Model
{
    protected $table = 'estado_contrato';
    protected $primaryKey = 'id_est_contrato';
    protected $fillable = ['nom_est_contrato'];
}
