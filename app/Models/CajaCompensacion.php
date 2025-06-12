<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajaCompensacion extends Model
{
    use HasFactory;

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_usuario');

    }

    protected $table = 'caja_compensacion';
    protected $primaryKey = 'id_caj_compen';

    public $timestamps = false;

    protected $fillable = [
        'id_caj_compen',
        'nom_caj_compen',
    ];

}
