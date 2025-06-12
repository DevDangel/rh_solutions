<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_usuario');

    }


    protected $table = 'municipio';

    protected $primaryKey='id_municipio';

    public $timestamps = false;

    protected $fillable = [
        'id_municipio',
        'nom_municipio',
        'id_departamento',
    ];

}


