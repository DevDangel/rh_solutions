<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arl extends Model
{
    //
    protected $table = 'arl'; // Nombre exacto de la tabla en la BD
    protected $primaryKey = 'id_arl'; // Clave primaria
    public $timestamps = false; // Desactivar timestamps porque solo leerás datos
}

