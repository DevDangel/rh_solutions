<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoLaboral extends Model
{
    protected $table = 'estado_laboral';
    protected $primaryKey = 'id_estado_laboral';
    public $timestamps = false;
}
