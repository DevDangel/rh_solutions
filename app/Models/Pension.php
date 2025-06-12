<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    use HasFactory;

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_usuario');

    }
    protected $table = 'pensiones';

    protected $primaryKey= 'id_pension';

    public $timestamps = false;

    protected $fillable = [
        'id_pension',
        'nom_pension',
    ];
}
