<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cargo;
use App\Models\Dependencia;


class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        $dependencias = Dependencia::all();

        return view('admin.gestionarCargo', compact('cargos', 'dependencias'));

    }

    public function create(Request $request)
    {

        try {
            $sql = DB::table('cargos')->insert([
                'cargo' => $request->cargo,
                'id_dependencia' => $request->dependencia,
            ]);

        } catch (\Throwable $th) {
            $sql = 0;
            // Si hay error, redirige con mensaje y conserva los datos del formulario
            return back()->with("Incorrecto", "Error al registrar el cargo")
                ->with("modal", "registrar_")
                ->withInput();
        }
        if ($sql == true) {
            return back()->with("Correcto", "Cargo registrado correctamente")
                ->with("modal", "registrar_");
        } else {
            return back()->with("Incorrecto", "Error al registrar el cargo")
                ->with("modal", "registrar_")
                ->withInput();
        }
    }


    public function update(Request $request, $id)
    {
        // Validación básica de los campos
        $request->validate([
            'cargo' => 'required|string|max:255',
            'id_dependencia' => 'required|integer',
        ]);

        try {
            // Obtener datos actuales del cargo
            $cargoActual = DB::table('cargos')->where('id_cargo', $id)->first();

            if (!$cargoActual) {
                return back()->with("Incorrect", "Cargo no encontrado.")
                    ->with("modal", "editar_" . $id);
            }

            // Nuevos datos del formulario
            $nuevosDatos = [
                'cargo' => $request->cargo,
                'id_dependencia' => $request->id_dependencia,
            ];

            // Normalizar tipos para comparación segura
            $datosActuales = array_map('strval', (array) $cargoActual);
            $nuevosDatosNormalizados = array_map('strval', $nuevosDatos);

            // Detectar cambios
            $datosComparables = array_intersect_key($datosActuales, $nuevosDatosNormalizados);
            $cambios = array_diff_assoc($nuevosDatosNormalizados, $datosComparables);

            // Si no hay cambios
            if (empty($cambios)) {
                return back()->with("Advertencia", "No se realizó ningún cambio.")
                    ->with("modal", "editar_" . $id);
            }

            // Aplicar actualización
            DB::table('cargos')->where('id_cargo', $id)->update($nuevosDatos);

            return back()->with("Correct", "Cargo actualizado correctamente.")
                ->with("modal", "editar_" . $id);

        } catch (\Throwable $th) {
            return back()->with("Incorrect", "Error al actualizar el cargo.")
                ->with("modal", "editar_" . $id);
        }
    }



    public function delete($id)
    {
        try {
            $sql = DB::delete("DELETE FROM cargos WHERE id_cargo = ?", [$id]);

        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("Eliminado", "Cargo eliminado correctamente");
        } else {
            return back()->with("Sin_eliminar", "Error al eliminar el cargo");
        }
    }


    public function validarCampo(Request $request)
    {
        $campo = $request->campo;
        $valor = $request->valor;

        $exists = DB::table('cargos')
            ->where($campo, $valor)
            ->exists();

        return response()->json(['exists' => $exists]);
    }

}
