<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;


class PersonasController extends Controller
{
    // Mostrar todos los registros de personas
    public function index()
    {
        $personas = Persona::with('municipio')->get(); // Cargar la relación municipio
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
    
        $municipios = collect(); 
        if (old('departamento_id')) {
            $municipios = Municipio::where('departamento_id', old('departamento_id'))->get();
        }
    
        // Pasamos los departamentos y municipios a la vista
        return view('personas.create', compact('departamentos', 'municipios'));
    }
    

    // Mostrar una persona específica
    public function show($persona_id)
    {
        $persona = Persona::with('municipio')->findOrFail($persona_id); // Cargar la relación municipio
        return view('personas.show', compact('persona'));
    }
    // Almacenar una nueva persona
    public function store(Request $request)
    {
        $request->validate([
            'dpi_cui' => 'required|digits:13|numeric|unique:personas,dpi_cui', 
            'nombres' => 'required|regex:/^[\pL\s]+$/u|max:50',
            'apellidos' => 'required|regex:/^[\pL\s]+$/u|max:50',
            'municipio_id' => 'required|integer',
            'direccion' => 'required|string|min:6|max:255',
            'fecha_nacimiento' => 'required|date_format:Y-m-d',
            'sexo' => 'required|in:M,F',
            'num_telefono' => 'nullable|digits_between:8,15|numeric',
            'tipo_persona' => 'required|in:F,S,O',
        ], [
            'dpi_cui.required' => 'El DPI es obligatorio.',
            'dpi_cui.digits' => 'El DPI debe tener exactamente 13 dígitos.',
            'dpi_cui.numeric' => 'El DPI solo debe contener números.',
             'dpi_cui.unique' => 'Este DPI ya está registrado.',
            'nombres.required' => 'El nombre es obligatorio.',
            'nombres.regex' => 'El nombre solo debe contener letras y espacios.',
            'nombres.max' => 'El nombre no debe superar los 50 caracteres.',
    
            'apellidos.required' => 'El apellido es obligatorio.',
            'apellidos.regex' => 'El apellido solo debe contener letras y espacios.',
            'apellidos.max' => 'El apellido no debe superar los 50 caracteres.',
    
            'municipio_id.required' => 'Debe seleccionar un municipio.',
            'municipio_id.integer' => 'El municipio seleccionado no es válido.',
    
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.min' => 'La dirección debe tener al menos 6 caracteres.',
            'direccion.max' => 'La dirección no debe superar los 255 caracteres.',
    
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date_format' => 'La fecha de nacimiento debe tener el formato YYYY-MM-DD.',
    
            'sexo.required' => 'Debe seleccionar un sexo.',
            'sexo.in' => 'El sexo debe ser "M" para masculino o "F" para femenino.',
    
            'num_telefono.digits_between' => 'El número de teléfono debe tener entre 8 y 15 dígitos.',
            'num_telefono.numeric' => 'El número de teléfono solo debe contener números.',
    
            'tipo_persona.required' => 'Debe seleccionar un tipo de persona.',
            'tipo_persona.in' => 'El tipo de persona debe ser "F" (feligrés), "S" (sacerdote) u "O" (obispo).',
        ]);
    
        Persona::create($request->all());
    
        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }
    public function edit($persona_id)
    {
        // Recuperamos la persona por su ID
        $persona = Persona::findOrFail($persona_id);

        // Recuperamos todos los municipios
        $municipios = Municipio::all();

        // Pasamos los datos a la vista
        return view('personas.edit', compact('persona', 'municipios'));
    }

    // Actualizar una persona
    public function update(Request $request, $persona_id)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dpi_cui' => 'required|string|max:13',
            'municipio_id' => 'required|integer',
            'direccion' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string',
            'num_telefono' => 'nullable|string|max:15',
            'tipo_persona' => 'required|string',
        ]);

        $persona = Persona::findOrFail($persona_id);
        $persona->update($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    }

    // Eliminar una persona
    public function destroy($persona_id)
    {
        $persona = Persona::findOrFail($persona_id);
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
    }
}
