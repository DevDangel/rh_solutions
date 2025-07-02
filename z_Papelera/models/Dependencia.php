<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $table = 'dependencias';
    protected $primaryKey = 'id_dependencia';
    public $timestamps = false;
    protected $fillable = ['nombre', 'descripcion']; // Para futuros inserts y updates
}
