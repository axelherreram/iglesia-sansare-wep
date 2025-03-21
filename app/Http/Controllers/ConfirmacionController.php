<?php

namespace App\Http\Controllers;

use App\Models\Confirmacion;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ConfirmacionController extends Controller
{
    /**
     * Muestra una lista de confirmaciones con paginación.
     */public function index(Request $request)
{
    $search = $request->input('search');

    // Crear la consulta base con las relaciones
    $query = Confirmacion::with([
        'personaConfirmada',
        'municipio',
        'departamento',
        'sacerdote',
        'padre',
        'madre',
        'padrino',
        'madrina'
    ]);

    if ($search) {
        // Si el input es solo números, buscar por DPI/CUI
        if (is_numeric($search)) {
            $query->whereHas('personaConfirmada', function ($q) use ($search) {
                $q->where('dpi_cui', 'like', "%{$search}%");
            });
        } else {
            // Buscar por nombre completo (nombre + apellido)
            $query->whereHas('personaConfirmada', function ($q) use ($search) {
                $q->whereRaw("CONCAT(nombres, ' ', apellidos) LIKE ?", ['%' . $search . '%']);
            });
        }
    }

    // Paginación de los resultados
    $confirmaciones = $query->paginate(10);

    // Mensaje en caso de no encontrar registros
    if ($confirmaciones->isEmpty()) {
        session()->flash('no_results', 'No se encontraron registros de confirmaciones con los datos especificados.');
    } else {
        session()->forget('no_results');
    }

    return view('confirmaciones.index', compact('confirmaciones'));
}


    /**
     * Muestra el formulario para crear una nueva confirmación.
     */
    public function create(Request $request)
    {
        $departamentos = Departamento::all();
        $departamento_id = old('departamento_id');
        $municipios = collect();

        // Cargar municipios si ya se seleccionó un departamento
        if ($departamento_id) {
            $municipios = Municipio::where('departamento_id', $departamento_id)->get();
        }

        return view('confirmaciones.create', compact('departamentos', 'municipios'));
    }


    /**
     * Almacena una nueva confirmación en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'persona_confirmada_id' => 'required|exists:personas,persona_id',
            'NoPartida' => 'required|string|max:20',
            'folio' => 'required|string|max:50',
            'fecha_confirmacion' => 'required|date',
            'nombre_parroquia_bautizo' => 'required|string|max:255',
            'municipio_id' => 'required|exists:municipio,municipio_id',
            'departamento_id' => 'required|exists:departamento,departamento_id',
            'sacerdote_id' => 'required|exists:personas,persona_id',
            'padre_id' => 'nullable|exists:personas,persona_id',
            'madre_id' => 'nullable|exists:personas,persona_id',
            'padrino_id' => 'nullable|exists:personas,persona_id',
            'madrina_id' => 'nullable|exists:personas,persona_id',
        ], [
            'persona_confirmada_id.required' => 'El campo persona confirmada es obligatorio.',
            'persona_confirmada_id.exists' => 'El ID de la persona confirmada no existe en la base de datos.',
            'NoPartida.required' => 'El campo número de partida es obligatorio.',
            'NoPartida.string' => 'El número de partida debe ser una cadena de texto.',
            'NoPartida.max' => 'El número de partida no puede exceder los 20 caracteres.',
            'folio.required' => 'El campo folio es obligatorio.',
            'folio.string' => 'El folio debe ser una cadena de texto.',
            'folio.max' => 'El folio no puede exceder los 50 caracteres.',
            'fecha_confirmacion.required' => 'La fecha de confirmación es obligatoria.',
            'fecha_confirmacion.date' => 'La fecha de confirmación debe ser una fecha válida.',
            'nombre_parroquia_bautizo.required' => 'El campo nombre de la parroquia de bautizo es obligatorio.',
            'nombre_parroquia_bautizo.string' => 'El nombre de la parroquia de bautizo debe ser una cadena de texto.',
            'nombre_parroquia_bautizo.max' => 'El nombre de la parroquia de bautizo no puede exceder los 255 caracteres.',
            'municipio_id.required' => 'El municipio es obligatorio.',
            'municipio_id.exists' => 'El municipio seleccionado no existe en la base de datos.',
            'departamento_id.required' => 'El departamento es obligatorio.',
            'departamento_id.exists' => 'El departamento seleccionado no existe en la base de datos.',
            'sacerdote_id.required' => 'El sacerdote es obligatorio.',
            'sacerdote_id.exists' => 'El ID del sacerdote no existe en la base de datos.',
            'padre_id.exists' => 'El ID del padre no existe en la base de datos.',
            'madre_id.exists' => 'El ID de la madre no existe en la base de datos.',
            'padrino_id.exists' => 'El ID del padrino no existe en la base de datos.',
            'madrina_id.exists' => 'El ID de la madrina no existe en la base de datos.',
        ]);

        // Verificar si ya existe una confirmación para la persona confirmada
        $confirmacionExistente = Confirmacion::where('persona_confirmada_id', $request->persona_confirmada_id)->first();
        if ($confirmacionExistente) {
            return redirect()->back()->withErrors([
                'persona_confirmada_id' => 'Esta persona ya ha sido confirmada previamente.',
            ]);
        }

        // Validación personalizada para asegurarse de que el mismo persona_id no esté en varios campos
        $personaIds = [
            $request->persona_confirmada_id,
            $request->sacerdote_id,
            $request->padre_id,
            $request->madre_id,
            $request->padrino_id,
            $request->madrina_id,
        ];

        // Eliminar valores nulos para verificar solo los campos con persona_id
        $personaIds = array_filter($personaIds, function ($value) {
            return !is_null($value);
        });

        if (count($personaIds) !== count(array_unique($personaIds))) {
            return redirect()->back()->withErrors([
                'persona_confirmada_id' => 'El mismo persona_id no puede ser usado en varios campos.',
            ]);
        }

        Confirmacion::create($validatedData);

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

    // Método para mostrar el detalle de una confirmación
    public function show($confirmacion_id)
    {
        $confirmacion = Confirmacion::with([
            'personaConfirmada',
            'municipio',
            'departamento',
            'sacerdote',
            'padre',
            'madre',
            'padrino',
            'madrina'
        ])->findOrFail($confirmacion_id);

        $departamentos = Departamento::all();

        return view('confirmaciones.show', compact('confirmacion', 'departamentos'));
    }

    /**
     * Actualiza un registro existente de confirmación en la base de datos.
     */
    public function update(Request $request, $confirmacion_id)
    {
        $validatedData = $request->validate([
            'persona_confirmada_id' => 'required|exists:personas,persona_id',
            'NoPartida' => 'required|string|max:20',
            'folio' => 'required|string|max:50',
            'fecha_confirmacion' => 'required|date',
            'nombre_parroquia_bautizo' => 'required|string|max:255',
            'municipio_id' => 'required|exists:municipio,municipio_id',
            'departamento_id' => 'required|exists:departamento,departamento_id',
            'sacerdote_id' => 'required|exists:personas,persona_id',
            'padre_id' => 'nullable|exists:personas,persona_id',
            'madre_id' => 'nullable|exists:personas,persona_id',
            'padrino_id' => 'nullable|exists:personas,persona_id',
            'madrina_id' => 'nullable|exists:personas,persona_id',
        ]);

        $confirmacion = Confirmacion::findOrFail($confirmacion_id);
        $confirmacion->update($validatedData);

        return redirect()->route('confirmaciones.index')->with('success', 'Confirmación actualizada exitosamente.');
    }
    public function generatePDF($confirmacion_id)
    {
        $confirmacion = Confirmacion::with([
            'personaConfirmada',
            'municipio',
            'departamento',
            'sacerdote',
            'padre',
            'madre',
            'padrino',
            'madrina'
        ])->findOrFail($confirmacion_id);

        $pdf = PDF::loadView('confirmaciones.pdf', compact('confirmacion'));
        return $pdf->stream('constancia-confirmacion.pdf');
    }

    public function edit($confirmacion_id)
    {
        $confirmacion = Confirmacion::with([
            'personaConfirmada',
            'municipio',
            'departamento',
            'sacerdote',
            'padre',
            'madre',
            'padrino',
            'madrina'
        ])->findOrFail($confirmacion_id);

        $departamentos = Departamento::all();
        $municipios = Municipio::where('departamento_id', $confirmacion->departamento_id)->get();

        return view('confirmaciones.edit', compact('confirmacion', 'departamentos', 'municipios'));
    }
}
