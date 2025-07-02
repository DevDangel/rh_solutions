<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiempoContrato extends Model
{
    protected $table = 'tiempo_contrato';
    protected $primaryKey = 'id_tiempo_cont';
    public $timestamps = false;
}
