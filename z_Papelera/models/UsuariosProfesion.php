<?php

namespace App\Models;
use App\Models\Usuario;
use App\Models\Profesion;

use Illuminate\Database\Eloquent\Model;

class UsuariosProfesion extends Model
{
    protected $table = 'usuarios_profesion';
    public $timestamps = false;
    protected $fillable = ['id_usuario', 'id_profesion', 'numero_registro_profesional'];
    // relacion N:N
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function profesion()
    {
        return $this->belongsTo(Profesion::class, 'id_profesion', 'id_profesion');
    }
}
