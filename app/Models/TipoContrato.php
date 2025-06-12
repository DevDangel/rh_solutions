<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    protected $table = 'tipo_contrato';
    protected $primaryKey = 'id_tip_contrato';
    public $incrementing = true;
    protected $fillable = ['nom_contrato'];
    public $timestamps = false;
}
