<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_usuario');

    }

    protected $table = 'departamentos';

    protected $primaryKey='id_departamento';

    public $timestamps = false;

    protected $fillable = [
        'id_departamento',
        'nom_departamento',
    ];

}


