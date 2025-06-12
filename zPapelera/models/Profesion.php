<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table = 'profesion';
    protected $primaryKey = 'id_profesion';
    public $timestamps = false;
    protected $fillable = ['nom_profesion', 'descripcion']; // futuros crud

    // relacion muchos a muchos
    public function usuarios(){
    return $this->belongsToMany(Usuario::class, 'usuarios_profesion', 'id_profesion', 'id_usuario')
                ->withPivot('numero_registro_profesional');
    }

}
