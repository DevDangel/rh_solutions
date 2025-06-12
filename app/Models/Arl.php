<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arl extends Model
{
    use HasFactory;

    public function usuarios(){
        return $this-> hasMany(Usuario::class,'id_usuario' );

    }
    protected $table = 'arl';

    protected $primaryKey = 'id_arl';

    public $timestamps = false;

    protected $fillable = [
        'id_arl',
        'nom_arl',
    ];
}
