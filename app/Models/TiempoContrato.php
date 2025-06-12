<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiempoContrato extends Model
{
    protected $table = 'tiempo_contrato';
    protected $primaryKey = 'id_tiemp_contrato';
    protected $fillable = ['nom_tiemp_contrato'];
}
