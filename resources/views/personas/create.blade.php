@extends('layouts.app')

@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <style>
        .card {
            max-width: 800px;
            margin: auto;
        }
    </style>
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header bg-transparent">
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary-ig-r">
                        <i class="lni lni-arrow-left"></i> Regresar
                    </a>
                    <h3 class="mt-3">Crear nueva persona</h3>
                </div>
                <form action="{{ route('personas.store') }}" method="POST" class="p-4">
                    @csrf
                    <!-- Correlativo y Fecha de nacimiento -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombres" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombres" name="nombres"
                                value="{{ old('nombres') }}">
                            @error('nombres')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="apellidos" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos"
                                value="{{ old('apellidos') }}">
                            @error('apellidos')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="dpi_cui" class="form-label">CUI:</label>
                            <input type="text" class="form-control" id="dpi_cui" name="dpi_cui"
                                value="{{ old('dpi_cui') }}">
                            @error('dpi_cui')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                value="{{ old('fecha_nacimiento') }}">
                            @error('fecha_nacimiento')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="departamento_id" class="form-label">Departamento:</label>
                            <select class="form-control" id="departamento_id" name="departamento_id">
                                <option value="">Seleccione un departamento</option>
                                @foreach($departamentos as $departamento)
                                    <option value="{{ $departamento->departamento_id }}" {{ old('departamento_id') == $departamento->departamento_id ? 'selected' : '' }}>
                                        {{ $departamento->depto }}
                                    </option>
                                @endforeach
                            </select>

                            @error('departamento_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="municipio_id" class="form-label">Municipio:</label>
                            <select class="form-control" id="municipio_id" name="municipio_id">
                                <option value="">Seleccione un municipio</option>
                                @foreach($municipios as $municipio)
                                    <option value="{{ $municipio->municipio_id }}" {{ old('municipio_id') == $municipio->municipio_id ? 'selected' : '' }}>
                                        {{ $municipio->municipio }}
                                    </option>
                                @endforeach
                            </select>
                            @error('municipio_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Dirección y Teléfono -->
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                value="{{ old('direccion') }}">
                            @error('direccion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="sexo" class="form-label">Sexo:</label>
                            <select class="form-control" id="sexo" name="sexo">
                                <option value="">Seleccione el sexo</option>
                                <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                                <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                                <option value="O" {{ old('sexo') == 'O' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('sexo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="tipo_persona" class="form-label">Tipo de Persona:</label>
                            <select class="form-control" id="tipo_persona" name="tipo_persona">
                                <option value="">Seleccione el tipo de persona</option>
                                <option value="F" {{ old('tipo_persona') == 'F' ? 'selected' : '' }}>Feligrés</option>
                                <option value="S" {{ old('tipo_persona') == 'S' ? 'selected' : '' }}>Sacerdote
                                </option>
                                <option value="O" {{ old('tipo_persona') == 'O' ? 'selected' : '' }}>Obispo</option>
                            </select>
                            @error('tipo_persona')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Botón de Guardar -->
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary-ig w-25">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!--plugins-->
    <script>
        document.getElementById('departamento_id').addEventListener('change', function () {
            let departamento_id = this.value;
            let municipioSelect = document.getElementById('municipio_id');

            municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>'; // Reset municipios

            if (departamento_id) {
                fetch(`/municipios/${departamento_id}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(municipio => {
                            let option = document.createElement('option');
                            option.value = municipio.municipio_id;
                            option.textContent = municipio.municipio;
                            option.selected = municipio.municipio_id == {{ old('municipio_id') }};  // Esto selecciona el municipio previamente seleccionado
                            municipioSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error al obtener municipios:', error));
            }
        });
    </script>

@endsection