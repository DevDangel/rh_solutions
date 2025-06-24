<?php

namespace App\Models;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipio';
    protected $primaryKey = 'id_municipio';
    public $timestamps = false;

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento', 'id_departamento');
    }
}
