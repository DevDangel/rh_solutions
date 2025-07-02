<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentosRequeridos extends Model
{
    protected $table = 'documentos_requeridos';
    protected $primaryKey = 'id_doc_requerido';
    public $timestamps = false;

    protected $fillable = [
        'id_cargo',
        'id_tip_document',
        'nom_documento',
        'obligatorio',
        'create_at'

    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tip_document');
    }
}
