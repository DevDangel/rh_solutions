<?php

namespace App\Models;
use App\Models\Dependencia; // pendiente
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $primaryKey = 'id_cargo';
    public $timestamps = false; // No tiene created_at ni updated_at

    //Relación con Dependencia
    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'id_dependencia', 'id_dependencia');
    }
}
