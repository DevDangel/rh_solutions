<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoUsuario extends Model
{
    use HasFactory;

    public function usuarios(){
        return $this-> hasMany(Usuario::class,'id_usuario' );

    }

    protected $table = 'estado_usuario';
    protected $primaryKey='id_estado';
    public $timestamps = false;

    protected $fillable = [
        'id_estado',
        'nom_estado',
    ];
}
