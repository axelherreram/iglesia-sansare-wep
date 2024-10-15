<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bautizo;
use App\Models\Municipio;
use App\Models\Departamento;

class BautizoController extends Controller
{
    // Método para mostrar la lista de bautizos
    public function index()
    {
        // Obtener todos los bautizos de la base de datos
        $bautizos = Bautizo::all();

        // Retornar la vista 'dashboard-list-bautizo' con los bautizos
        return view('list-bautizo', compact('bautizos'));
    }
    /**
     * Muestra el formulario para crear un bautizo.
     */
    public function create()
    {
        // Obtener todos los departamentos para el selector
        $departamentos = Departamento::all();

        return view('bautizo-craete-update', compact('departamentos'));
    }

    /**
     * Almacena un nuevo registro de bautizo en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'NoPartida' => 'required|string|max:20',
            'folio' => 'required|string|max:50',
            'fecha_bautizo' => 'required|date',
            'nombre_persona_bautizada' => 'required|string|max:255',
            'edad' => 'nullable|string|max:4',
            'fecha_nacimiento' => 'nullable|date',
            'aldea' => 'nullable|string|max:255',
            'municipio_id' => 'required|exists:municipio,municipio_id',
            'departamento_id' => 'required|exists:departamento,departamento_id',
            'nombre_padre' => 'nullable|string|max:255',
            'nombre_madre' => 'nullable|string|max:255',
            'nombre_sacerdote' => 'nullable|string|max:255',
            'nombre_padrino' => 'nullable|string|max:255',
            'nombre_madrina' => 'nullable|string|max:255',
            'margen' => 'nullable|string|max:200',
        ]);

        // Crear un nuevo registro en la tabla 'bautizo'
        Bautizo::create([
            'NoPartida' => $validatedData['NoPartida'],
            'folio' => $validatedData['folio'],
            'fecha_bautizo' => $validatedData['fecha_bautizo'],
            'nombre_persona_bautizada' => $validatedData['nombre_persona_bautizada'],
            'edad' => $validatedData['edad'],
            'fecha_nacimiento' => $validatedData['fecha_nacimiento'],
            'aldea' => $validatedData['aldea'],
            'municipio_id' => $validatedData['municipio_id'],
            'departamento_id' => $validatedData['departamento_id'],
            'nombre_padre' => $validatedData['nombre_padre'],
            'nombre_madre' => $validatedData['nombre_madre'],
            'nombre_sacerdote' => $validatedData['nombre_sacerdote'],
            'nombre_padrino' => $validatedData['nombre_padrino'],
            'nombre_madrina' => $validatedData['nombre_madrina'],
            'margen' => $validatedData['margen'],
        ]);

        // Redirigir al usuario a la página deseada, por ejemplo, el listado de bautizos
        return redirect()->route('bautizos.index')->with('success', 'Bautizo guardado exitosamente.');
    }

    /**
     * Obtiene los municipios basados en el departamento seleccionado.
     */
    public function getMunicipios($departamento_id)
    {
        // Obtener los municipios relacionados con el departamento
        $municipios = Municipio::where('departamento_id', $departamento_id)->get();

        // Devolver los municipios como respuesta JSON
        return response()->json($municipios);
    }
}
