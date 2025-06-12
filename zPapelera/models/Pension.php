<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $table = 'pensiones';
    protected $primaryKey = 'id_pension';
    public $timestamps = false;
}

