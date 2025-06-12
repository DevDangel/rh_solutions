<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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


class CrudController extends Controller
{
    public function index()
    {
        // Obtener todos los datos necesarios
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

        // Enviar todos los datos a la vista
        return view("admin.listUser", compact(
            'usuarios', 'departamentos', 'municipios', 'cargos', 'EstadosUsuario',
            'Eps', 'pensiones', 'Arl', 'cajasCompensacion', 'profesiones'
        ));
    }
    public function create(Request $request)
    {

        $request->merge([
            'correo' => strtolower(trim($request->correo))
        ]);

        $request->validate([
            'correo' => 'required|email|max:255|unique:usuarios,correo_usuario',

            'contraseña' => [
                'required',
                'min:8',
                'regex:/^(?=(?:[^0-9]*\d){6})(?=.*[a-z])(?=.*[A-Z])[A-Za-z\d!@#$%^&*()_+=\-{}\[\]:;"\'<>,.?\/]{8,10}$/'
            ],

        ], [
            'contraseña.regex' => 'Mínimo 5 números, al menos 1 letra minúscula,al menos 1 letra mayúscula,1 símbolo(Longitud entre 8 y 10 caracteres)'
        ]);
      //  dd($request->all());
        try {
            $sql = DB::insert(" insert into usuarios(doc_usuario,
        tip_documento, pri_nombre, seg_nombre, pri_apellido, seg_apellido,
        fec_nacimiento,tip_sangre, sex_usuario, estado_civil,dir_usuario,cel_usuario,cel_emer_usuario,correo_usuario,registro_profesional,contraseña,id_departamento, id_municipio,id_estado,id_cargo,id_eps,id_pension,id_arl, id_caj_compen,id_profesion) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                $request->num_documento,
                $request->tip_documento,
                $request->prim_nombre,
                $request->segun_nombre,
                $request->prim_apellido,
                $request->segun_apellido,
                $request->fech_nac,
                $request->tip_sangre,
                $request->sexo,
                $request->est_civil,
                $request->direccion,
                $request->celular,
                $request->celular_emerg,
                $request->correo,
                $request->registro_profesional,
                $request->contraseña,
                $request->departamento,
                $request->munici_residen,
                $request->est_usuario,
                $request->cargo,
                $request->eps,
                $request->pension,
                $request->arl,
                $request->caj_compen,
                $request->profesion,
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
            // Si hay error, redirige con mensaje y conserva los datos del formulario
            return back()->with("Incorrecto", "Error al registrar el usuario")
                ->with("modal", "registrar_")
                ->withInput();
        }
        if ($sql == true) {
            return back()->with("Correcto", "Usuario registrado correctamente")
                ->with("modal", "registrar_");
        } else {
            return back()->with("Incorrecto", "Error al registrar el usuario")
                ->with("modal", "registrar_")
                ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        // Validación básica sugerida
        $request->validate([

        ]);

        try {
            $update = DB::table('usuarios')
                ->where('id_usuario', $id)
                ->update([
                    'tip_documento' => $request->tip_documento,
                    'doc_usuario' => $request->num_documento,
                    'pri_nombre' => $request->prim_nombre,
                    'seg_nombre' => $request->segun_nombre,
                    'pri_apellido' => $request->prim_apellido,
                    'seg_apellido' => $request->segun_apellido,
                    'fec_nacimiento' => $request->fech_nac,
                    'tip_sangre' => $request->tip_sangr,
                    'sex_usuario' => $request->sexo,
                    'estado_civil' => $request->est_civil,
                    'cel_usuario' => $request->celular,
                    'id_departamento' => $request->departamento,
                    'dir_usuario' => $request->direccion,
                    'id_municipio' => $request->munici_residen,
                    'cel_emer_usuario' => $request->celular_emerg,
                    'correo_usuario' => $request->correo,
                    'id_profesion' => $request->profesion,
                    'registro_profesional' => $request->registro_profesional,
                    'id_cargo' => $request->cargo,
                    'id_estado' => $request->est_usuario,
                    'id_eps' => $request->eps,
                    'id_pension' => $request->pension,
                    'id_arl' => $request->arl,
                    'id_caj_compen' => $request->caj_compen
                ]);

            if ($update === 0) {
                return back()->with("Advertencia", "No se realizó ningún cambio.");
            }

            return back()->with("Correct", "Usuario actualizado correctamente")
                ->with("modal", "editar_" . $id);

        } catch (\Throwable $th) {
            return back()->with("Incorrect", "Error al actualizar el usuario")
                ->with("modal", "editar_" . $id);
        }
    }


    public function delete($id)
    {
        try {
            $sql = DB::delete("DELETE FROM usuarios WHERE id_usuario=$id");
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("Correcto", "Usuario eliminado correctamente");
        } else {
            return back()->with("Incorrecto", "Error al eliminar el usuario");
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'profesion' => 'required|string|max:255',
            'reg_profesional' => function ($attribute, $value, $fail) use ($request) {
                if (!in_array(strtolower($request->input('profesion')), ['aseador', 'conductor']) && empty($value)) {
                    $fail('El campo Registro profesional es obligatorio para esta profesión.');
                }
            },
        ]);

        // Si pasa la validación, puedes guardar los datos
        // Empleado::create([...]);
    }


}
