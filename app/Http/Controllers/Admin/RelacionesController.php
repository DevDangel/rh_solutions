<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Arl;
use App\Models\Usuario;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Cargo;
use App\Models\EstadoUsuario;
use App\Models\Eps;
use App\Models\Pension;
use App\Models\CajaCompensacion;
use App\Models\Profesion;


class RelacionesController extends Controller
{

    public function index()
    {

        $usuarios = Usuario::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $cargos = Cargo::all();
        $EstadosUsuario = EstadoUsuario::all();
        $Eps = Eps::all();
        $pensiones = Pension::all();
        $Arl = Arl::all();
        $cajasCompensacion = CajaCompensacion::all();
        $profesiones = Profesion::all();
        return view('admin.listUser', compact('usuarios', 'departamentos', 'municipios', 'cargos', 'EstadosUsuario', 'Eps', 'pensiones', 'Arl', 'cajasCompensacion', 'profesiones'));

    }

    public function getMunicipios($idDepartamento)
    {
        $municipios = Municipio::where('id_departamento', $idDepartamento)->get();

        return response()->json($municipios);
    }
}

