<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_usuario');

    }

    protected $table = 'cargos';

    protected $primaryKey='id_cargo';

    public $timestamps = false;

    protected $fillable = [
        'id_cargo',
        'cargo',
    ];
    public function dependencias(){
    return $this->belongsTo(Dependencia::class,'id_dependencia','id_dependencia');
}
}

