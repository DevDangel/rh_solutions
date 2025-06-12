<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CajaCompensacion extends Model
{
    protected $table = 'caja_compensacion';
    protected $primaryKey = 'id_caj_compensacion';
    public $timestamps = false;
}
