<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    use HasFactory;

    public function usuarios(){
        return $this-> hasMany(Usuario::class,'id_usuario' );

    }


    protected $table = 'profesion';

    protected $primaryKey = 'id_profesion';

    public $timestamps = false;

    protected $fillable = [
        'id_profesion',
        'nom_profesion',
    ];
}
