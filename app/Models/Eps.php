<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eps extends Model
{
    use HasFactory;

    public function usuarios(){
        return $this-> hasMany(Usuario::class,'id_usuario' );

    }

    protected $table = 'eps';

    protected $primaryKey = 'id_eps';

    public $timestamps = false;

    protected $fillable = [
        'id_eps',
        'nom_eps',
    ];
}
