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

    public function documentosRequeridos()
    {
        return $this->hasMany(DocumentosRequeridos::class, 'id_cargo');
    }

    protected $table = 'cargos';

    protected $primaryKey='id_cargo';

    public $timestamps = false;

    protected $fillable = [
        'id_cargo',
        'cargo',
    ];
}

