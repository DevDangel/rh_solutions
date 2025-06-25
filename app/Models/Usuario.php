<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{

use HasFactory, Notifiable;
protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // descativar las tablas create_at y update_at

    protected $fillable = [
        'doc_usuario',
        'tip_documento',
        'pri_nombre',
        'seg_nombre',
        'pri_apellido',
        'seg_apellido',
        'fec_nacimiento',
        'tip_sangre',
        'sex_usuario',
        'estado_civil',
        'dir_usuario',
        'cel_usuario',
        'cel_emer_usuario',
        'correo_usuario',
        'registro_profesional',
        'contraseña',
        'id_departamento',
        'id_municipio',
        'id_estado',
        'id_cargo',
        'id_eps',
        'id_pension',
        'id_arl',
        'id_caj_compen',
        'id_profesion',
        'img_perfil'
    ];
public function eps(){
    return $this->belongsTo(Eps::class,'id_eps','id_eps');
}

public function pensiones(){
    return $this->belongsTo(Pension::class,'id_pension','id_pension');
}
public function arl(){
    return $this->belongsTo(Arl::class,'id_arl','id_arl');
}
public function cargos(){
    return $this->belongsTo(Cargo::class,'id_cargo','id_cargo');
}

public function estado(){
    return $this->belongsTo(EstadoUsuario::class,'id_estado','id_estado');
}

public function cajaCompensacion(){
    return $this->belongsTo(CajaCompensacion::class,'id_caj_compen','id_caj_compen');
}

public function departamentos(){
    return $this->belongsTo(Departamento::class,'id_departamento','id_departamento');
}
public function municipio(){
    return $this->belongsTo(Municipio::class,'id_municipio','id_municipio');
}

public function profesiones(){
    return $this->belongsTo(Profesion::class,'id_profesion','id_profesion');
}
}
