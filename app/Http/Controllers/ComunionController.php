<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comunion;
use App\Models\Municipio;
use App\Models\Departamento;

class ComunionController extends Controller
{
    // Método para mostrar la lista de comuniones con búsqueda
    public function index(Request $request)
    {
        // Recibir los valores del formulario de búsqueda
        $search = $request->input('search');
        $year = $request->input('year');

        // Construir la consulta para buscar por nombre, apellido o año de la comunión
        $comuniones = Comunion::query()
            ->when($search, function ($query, $search) {
                return $query->where('nombre_persona_participe', 'like', '%' . $search . '%');
            })
            ->when($year, function ($query, $year) {
                return $query->whereYear('fecha_comunion', $year);
            })
            ->paginate(10);

        // Retornar la vista 'list-comunion' con las comuniones y los términos de búsqueda
        return view('list-comunion', compact('comuniones', 'search', 'year'));
    }

    /**
     * Muestra el formulario para crear una nueva comunión.
     */
    public function create()
    {
        // Obtener todos los departamentos para el selector
        $departamentos = Departamento::all();

        return view('comunion-craete-update', compact('departamentos'));
    }

    /**
     * Almacena un nuevo registro de comunión en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario con mensajes personalizados
        $validatedData = $request->validate([
            'NoPartida' => 'required|string|max:20',
            'folio' => 'required|string|max:50',
            'fecha_comunion' => 'required|date',
            'nombre_persona_participe' => 'required|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'municipio_id' => 'required|exists:municipio,municipio_id',
            'departamento_id' => 'required|exists:departamento,departamento_id',
            'nombre_padre' => 'nullable|string|max:255',
            'nombre_madre' => 'nullable|string|max:255',
        ], [
            'NoPartida.required' => 'El número de partida es obligatorio.',
            'folio.required' => 'El folio es obligatorio.',
            'fecha_comunion.required' => 'La fecha de la comunión es obligatoria.',
            'nombre_persona_participe.required' => 'El nombre de la persona es obligatorio.',
            'municipio_id.required' => 'El municipio es obligatorio.',
            'departamento_id.required' => 'El departamento es obligatorio.',
        ]);

        // Crear un nuevo registro en la tabla 'comunion'
        Comunion::create([
            'NoPartida' => $validatedData['NoPartida'],
            'folio' => $validatedData['folio'],
            'fecha_comunion' => $validatedData['fecha_comunion'],
            'nombre_persona_participe' => $validatedData['nombre_persona_participe'],
            'fecha_nacimiento' => $validatedData['fecha_nacimiento'],
            'municipio_id' => $validatedData['municipio_id'],
            'departamento_id' => $validatedData['departamento_id'],
            'nombre_padre' => $validatedData['nombre_padre'],
            'nombre_madre' => $validatedData['nombre_madre'],
        ]);

        // Redirigir al usuario a la lista de comuniones con un mensaje de éxito
        return redirect()->route('comuniones.index')->with('success', 'Primera comunión guardada exitosamente.');
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