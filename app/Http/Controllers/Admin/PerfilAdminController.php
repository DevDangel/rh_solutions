<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Arl;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Cargo;
use App\Models\EstadoUsuario;
use App\Models\Eps;
use App\Models\Pension;
use App\Models\CajaCompensacion;
use App\Models\Profesion;

class PerfilAdminController extends Controller
{
    public function index(){
        // Autenticación con el guard 'usuario'
        $usuario = Auth::guard('admin')->user();

        // traernos los campos de las demas tablas
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $cargos = Cargo::all();
        $estadosUsuario = EstadoUsuario::all();
        $eps = Eps::all();
        $pensiones = Pension::all();
        $arl = Arl::all();
        $cajasCompensacion = CajaCompensacion::all();
        $profesiones = Profesion::all();

        return view('admin.perfilAdmin', compact(
            'usuario', 'departamentos', 'municipios', 'cargos',
            'estadosUsuario', 'eps', 'pensiones', 'arl',
            'cajasCompensacion', 'profesiones'
        ));
    }
    public function update(Request $request){
        $usuario = Auth::guard('admin')->user();

        // Validaciones básicas, puedes ajustar según tus reglas
        $request->validate([
            'correo_usuario' => 'required|email',
            'cel_usuario' => 'required|string|max:45',
            'cel_emer_usuario' => 'nullable|string|max:45',
            'estado_civil' => 'required|string',
            'sexo' => 'required|string',
            'dir_usuario' => 'required|string|max:255',
            'id_departamento' => 'required|integer',
            'id_municipio' => 'required|integer',
            'foto_perfil' => 'nullable|image|max:20428', // hasta 20mb
        ]);
        // crear la carpeta imgs si no existe al guardar la imagen en la bd care pastel
        if (!Storage::disk('public')->exists('imgs')) {
            Storage::disk('public')->makeDirectory('imgs');
        }
        // cuando suba una nueva foto
        if ($request->hasFile('foto_perfil')) {
            $ruta = $request->file('foto_perfil')->store('imgs', 'public');
            $usuario->img_perfil = 'storage/' . $ruta;
        }

        // Actualizar campos editables
        /** @var \App\Models\Usuario $usuario */ // esto se hace para que intelphense no detecte error de metodo dinamicos
        $usuario->update([
            'correo_usuario' => $request->correo_usuario,
            'cel_usuario' => $request->cel_usuario,
            'cel_emer_usuario' => $request->cel_emer_usuario,
            'estado_civil' => $request->estado_civil,
            'sex_usuario' => $request->sexo,
            'dir_usuario' => $request->dir_usuario,
            'id_departamento' => $request->id_departamento,
            'id_municipio' => $request->id_municipio,
        ]);

        return redirect()->route('perfilAdmin')->with('estado', 'success');
    }
    public function municipiosPorDepartamento($id){
        $municipios = Municipio::where('id_departamento', $id)->get();
        return response()->json($municipios);
    }

}
