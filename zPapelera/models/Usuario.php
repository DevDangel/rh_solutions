<?php

namespace App\Models;

use App\Models\Arl;
use App\Models\Cargo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;



class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // descativar las tablas create_at y update_at

    protected $fillable = [
        'tip_documento',
        'doc_usuario',
        'pri_nombre',
        'seg_nombre',
        'pri_apellido',
        'seg_apellido',
        'fec_nacimiento',
        'sex_usuario',
        'estado_civil',
        'dir_usuario',
        'id_departamento',       // <-- se mueve la columna nueva
        'id_municipio',
        'cel_usuario',
        'cel_emer_usuario',
        'correo_usuario',
        'numero_registro_profesional',
        'id_estado',
        'contraseña',
        'id_cargo',
        'id_eps',
        'id_pension',
        'id_arl',
        'id_caj_compen'
    ];
    // relaciones
    public function arl(){
    return $this->belongsTo(Arl::class, 'id_arl', 'id_arl');
    }
    public function cargo(){
    return $this->belongsTo(Cargo::class, 'id_cargo', 'id_cargo');
    }

    // pendiente contrato
    // pendiente documentos

    public function dependencia(){
    return $this->belongsTo(Dependencia::class, 'id_dependencia', 'id_dependencia');
    }
    public function eps(){
    return $this->belongsTo(Eps::class, 'id_eps', 'id_eps');
    }
    public function estado(){
    return $this->belongsTo(EstadoUsuario::class, 'id_estado', 'id_estado');
    }
    public function municipio(){
    return $this->belongsTo(Municipio::class, 'id_municipio', 'id_municipio');
    }
    public function pension(){
    return $this->belongsTo(Pension::class, 'id_pension', 'id_pension');
    }
    // relacion muchos a muchos
    public function profesiones(){
    return $this->belongsToMany(Profesion::class, 'usuarios_profesion', 'id_usuario', 'id_profesion')
                ->withPivot('numero_registro_profesional');
    }
    public function departamento(){
        return $this->belongsTo(Departamento::class, 'id_departamento', 'id_departamento');
    }

    public function cajaCompensacion(){
        return $this->belongsTo(CajaCompensacion::class, 'id_caj_compensacion', 'id_caj_compensacion');
    }

}
