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
    // Vista principal con relaciones cargadas
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

        return view('admin.listUser', compact(
            'usuarios', 'departamentos', 'municipios', 'cargos',
            'EstadosUsuario', 'Eps', 'pensiones', 'Arl',
            'cajasCompensacion', 'profesiones'
        ));
    }

    // Registrar nuevo usuario
    public function create(Request $request)
    {
        try {
            $sql = DB::insert(" insert into usuarios(tip_documento,
        doc_usuario, pri_nombre, seg_nombre, pri_apellido, seg_apellido,
        fec_nacimiento,tip_sangre, sex_usuario, estado_civil,cel_usuario,id_departamento, dir_usuario, id_municipio, cel_emer_usuario, correo_usuario,id_profesion,registro_profesional,id_cargo,contraseña,id_estado,id_eps, id_pension,
        id_arl, id_caj_compen ) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                $request->tip_documento,
                $request->num_documento,
                $request->prim_nombre,
                $request->segun_nombre,
                $request->prim_apellido,
                $request->segun_apellido,
                $request->fech_nac,
                $request->tip_sangre,
                $request->sexo,
                $request->est_civil,
                $request->celular,
                $request->departamento,
                $request->direccion,
                $request->munici_residen,
                $request->celular_emerg,
                $request->correo,
                $request->profesion,
                $request->registro_profesional,
                $request->cargo,
                $request->contraseña,
                $request->est_usuario,
                $request->eps,
                $request->pension,
                $request->arl,
                $request->caj_compen,
            ]);
        } catch (\Throwable $th) {
            return back()->with("Incorrecto", "Error al registrar el usuario")
                        ->with("modal", "registrar_")
                        ->withInput();
        }
        return $sql
            ? back()->with("Correcto", "Usuario registrado correctamente")->with("modal", "registrar_")
            : back()->with("Incorrecto", "Error al registrar el usuario")->with("modal", "registrar_")->withInput();
    }

    // Actualizar usuario existente
    public function update(Request $request, $id)
    {
        $request ->validate([
            // validaciones
        ]);
        try {
            $usuarioActual = DB::table('usuarios')->where('id_usuario', $id)->first();

            if (!$usuarioActual) {
                return back()->with("Incorrect", "Usuario no encontrado.")->with("modal", "editar_" . $id);
            }

            $nuevosDatos = [
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
                'id_caj_compen' => $request->caj_compen,
            ];
            // Convertir el objeto actual a array y filtrar las mismas claves
            $datosActuales = (array) $usuarioActual;
            $datosComparables = array_intersect_key($datosActuales, $nuevosDatos);

            // Comparar si hay cambios
            $cambios = array_diff_assoc($nuevosDatos, $datosComparables);

            if (empty($cambios)) {
                return back()->with("Advertencia", "No se realizó ningún cambio.")->with("modal", "editar_" . $id);
            }
            // realizar la actulizacion
            DB::table('usuarios')->where('id_usuario', $id)->update($nuevosDatos);

            return back()->with("Correct", "Usuario actualizado correctamente.")->with("modal", "editar_" . $id);
        } catch (\Throwable $th) {
            return back()->with("Incorrect", "Error al actualizar el usuario.")->with("modal", "editar_" . $id);
        }
    }

    // Eliminar usuario
    public function delete($id)
    {
        try {
            $sql = DB::delete("DELETE FROM usuarios WHERE id_usuario = ?", [$id]);
        } catch (\Throwable $th) {
            $sql = 0;
        }
        return $sql
            ? back()->with("Eliminado", "Usuario eliminado correctamente")
            : back()->with("Sin_eliminar", "Error al eliminar el usuario");
    }

    public function store(Request $request)
    {
        $request->validate([
            'profesion' => 'required',
            'registro_profesional' => function ($attribute, $value, $fail) use ($request) {
                $profesionId = $request->input('profesion');

                // Aquí debes obtener el nombre real de la profesión usando el ID
                $profesion = DB::table('profesiones')->where('id_profesion', $profesionId)->value('nom_profesion');

                if (!in_array(strtolower($profesion), ['aseador', 'conductor']) && empty($value)) {
                    $fail('El campo Registro profesional es obligatorio para esta profesión.');
                }
            },
        ]);

    }
    // Obtener municipios por departamento
    public function getMunicipios($idDepartamento)
    {
        $municipios = Municipio::where('id_departamento', $idDepartamento)->get();
        return response()->json($municipios);
    }

    // Validación general vía AJAX
    public function validarCampo(Request $request){
        $request->validate([
            'campo' => 'required|in:num_documento,correo,celular',
            'valor' => 'required|string|max:255',
        ]);

        $campo = $request->input('campo');
        $valor = trim($request->input('valor'));

        $mapaCampos = [
            'num_documento' => 'doc_usuario',
            'correo' => 'correo_usuario',
            'celular' => 'cel_usuario',
        ];

        $columna = $mapaCampos[$campo];

        $exists = DB::table('usuarios')
            ->where($columna, $valor)
            ->exists();

        return response()->json(['exists' => $exists]);
    }


    // Validación individual para celular (extra)
    public function validarCelular(Request $request)
    {
        $celular = $request->input('celular');

        // Verificar si ya existe en la tabla usuarios (columna cel_usuario)
        $existe = DB::table('usuarios')->where('cel_usuario', $celular)->exists();

        return response()->json(['existe' => $existe]);
    }
}

