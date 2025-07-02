<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $primaryKey = 'id_documentos';
    public $timestamps = false;

    protected $fillable = [
        'id_documentos',
        'nom_documento',
        'ruta_archivo',
        'created_at ',
        'updated_at',
        'fecha_vencimiento',
        'serial_unico',
        'estado',
        'id_usuario',
        'id_tip_document'
    ];

    public function usuario()

    {
        return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function tipoDocumento()

    {
    return $this->belongsTo(\App\Models\TipoDocumento::class, 'id_tip_document', 'id_tip_document');
}

}
