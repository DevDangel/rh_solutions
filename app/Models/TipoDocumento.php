<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documento';
    protected $primaryKey = 'id_tip_document';
    public $timestamps = false;

    public function documentosRequeridos()
    {
        return $this->hasMany(DocumentosRequeridos::class, 'id_tip_document');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'id_tip_document');
    }
}
