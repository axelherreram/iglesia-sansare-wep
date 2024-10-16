<?php

namespace App\Http\Controllers;

use App\Models\Confirmacion;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;

class ConfirmacionController extends Controller
{
    /**
     * Muestra una lista de confirmaciones con paginación.
     */
    public function index(Request $request)
    {
        $search = $request->input('nombre');
        $year = $request->input('fecha_confirmacion');

        // Filtra por nombre y año si se proporcionan parámetros de búsqueda
        $confirmaciones = Confirmacion::query()
            ->when($search, function ($query, $search) {
                return $query->where('nombre_persona_confirmada', 'like', "%{$search}%");
            })
            ->when($year, function ($query, $year) {
                return $query->whereYear('fecha_confirmacion', $year);
            })
            ->paginate(10);

        return view('list-confirmacion', compact('confirmaciones'));
    }

    /**
     * Muestra el formulario para crear una nueva confirmación.
     */
    public function create()
    {
        // Obtener todos los departamentos para el selector
        $departamentos = Departamento::all();

        return view('confirmacion-craete-update', compact('departamentos'));
    }

    /**
     * Almacena una nueva confirmación en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'NoPartida' => 'required|string|max:20',
            'folio' => 'required|string|max:50',
            'fecha_confirmacion' => 'required|date',
            'nombre_persona_confirmo' => 'required|string|max:255',
            'nombre_persona_confirmada' => 'required|string|max:255',
            'edad' => 'required|string|max:4',
            'nombre_parroquia_bautizo' => 'required|string|max:255',
            'municipio_id' => 'required|exists:municipio,municipio_id',
            'departamento_id' => 'required|exists:departamento,departamento_id',
            'nombre_padre' => 'nullable|string|max:255',
            'nombre_madre' => 'nullable|string|max:255',
            'nombre_persona_padrino' => 'nullable|string|max:255',
            'nombre_persona_madrina' => 'nullable|string|max:255',
        ], [
            'NoPartida.required' => 'El número de partida es obligatorio.',
            'folio.required' => 'El folio es obligatorio.',
            'fecha_confirmacion.required' => 'La fecha de la confirmación es obligatoria.',
            'nombre_persona_confirmada.required' => 'El nombre de la persona confirmada es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'municipio_id.required' => 'El municipio es obligatorio.',
            'departamento_id.required' => 'El departamento es obligatorio.',
        ]);

        // Crear un nuevo registro en la tabla 'confirmacion'
        Confirmacion::create($validatedData);

        // Redirigir al usuario a la lista de confirmaciones con un mensaje de éxito
        return redirect()->route('confirmaciones.index')->with('success', 'Confirmación guardada exitosamente.');
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
