<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;
    public function cargos()
    {
        return $this->hasMany(Cargo::class, 'id_cargo');

    }

    protected $table = 'dependencias';

    protected $primaryKey='id_dependencia';

    public $timestamps = false;

    protected $fillable = [
        'id_dependencia',
        'dependencia',
    ];
}
