@extends('layouts.app')

@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <style>
        .card {
            max-width: 800px;
            margin: 0 auto;
        }

        .row.mb-3 {
            margin-bottom: 1.5rem;
        }
    </style>
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10 ">
                <div class="card-header bg-transparent">
                    <a href="dashboard" class="btn btn-sm btn-primary-ig-r">
                        <i class="lni lni-arrow-left"></i> Regresar
                    </a>
                    <h3 class="mt-3">Crear nuevo bautizo</h3>
                </div>

                <form action="{{ route('bautizos.store') }}" method="POST" class="p-4">
                    @csrf
                    <!-- Correlativo y Fecha del Bautizo -->
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <label for="NoPartida" class="form-label">Partida No:</label>
                            <input type="text" class="form-control" id="NoPartida" name="NoPartida">
                        </div>
                        <div class="col-sm-3">
                            <label for="folio" class="form-label">Folio:</label>
                            <input type="text" class="form-control" id="folio" name="folio">
                        </div>
                        <div class="col-sm-6">
                            <label for="fecha_bautizo" class="form-label">Fecha de bautizo:</label>
                            <input type="date" class="form-control" id="fecha_bautizo" name="fecha_bautizo">
                        </div>
                    </div>

                    <!-- Datos de la persona bautizada -->
                    <div class="row mb-3">
                        <label for="nombre_persona_bautizada" class="col-sm-3 col-form-label">Nombre de la persona
                            bautizada:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_persona_bautizada"
                                name="nombre_persona_bautizada">
                        </div>
                    </div>
                    <!-- Fecha de Nacimiento y edad -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="edad" class="form-label">Edad:</label>
                            <input type="text" class="form-control" id="edad" name="edad">
                        </div>
                        <div class="col-sm-6">
                            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                        </div>
                    </div>

                    <!-- Aldea -->
                    <div class="row mb-3">
                        <label for="aldea" class="col-sm-2 col-form-label">Aldea:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="aldea" name="aldea">
                        </div>
                    </div>

                    <!-- Ubicación -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="departamento" class="form-label">Departamento:</label>
                            <select class="form-control" id="departamento" name="departamento_id">
                                <option value="">Seleccione el departamento</option>
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->departamento_id }}">{{ $departamento->depto }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="municipio" class="form-label">Municipio:</label>
                            <select class="form-control" id="municipio" name="municipio_id">
                                <option value="">Seleccione el municipio</option>
                            </select>
                        </div>
                    </div>

                    <!-- Datos de los Padres -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_padre" class="form-label">Nombre del padre:</label>
                            <input type="text" class="form-control" id="nombre_padre" name="nombre_padre">
                        </div>
                        <div class="col-sm-6">
                            <label for="nombre_madre" class="form-label">Nombre de la madre:</label>
                            <input type="text" class="form-control" id="nombre_madre" name="nombre_madre">
                        </div>
                    </div>

                    <!-- Datos del Sacerdote -->
                    <div class="row mb-3">
                        <label for="nombre_sacerdote" class="col-sm-3 col-form-label">Nombre del sacerdote:</label>
                        <input type="text" class="form-control" id="nombre_sacerdote" name="nombre_sacerdote">
                    </div>

                    <!-- Datos de los Padrinos -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_padrino" class="form-label">Nombre del padrino:</label>
                            <input type="text" class="form-control" id="nombre_padrino" name="nombre_padrino">
                        </div>
                        <div class="col-sm-6">
                            <label for="nombre_madrina" class="form-label">Nombre de la madrina:</label>
                            <input type="text" class="form-control" id="nombre_madrina" name="nombre_madrina">
                        </div>
                    </div>

                    <!-- Margen -->
                    <div class="row mb-3">
                        <label for="margen" class="col-sm-2 col-form-label">Margen:</label>
                        <textarea class="form-control" id="margen" name="margen"></textarea>
                    </div>
            </div>

            <!-- Botón de Guardar -->
            <div class="row mt-3">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary-ig w-25 w-sm-25">Guardar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('departamento').addEventListener('change', function() {
            const departamentoId = this.value;
            const municipioSelect = document.getElementById('municipio');

            // Limpiar el selector de municipios
            municipioSelect.innerHTML = '<option value="">Seleccione el municipio</option>';

            if (departamentoId) {
                // Realizar la petición AJAX para obtener los municipios
                fetch(`/municipios/${departamentoId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Agregar los municipios al select de municipios
                        data.forEach(municipio => {
                            const option = document.createElement('option');
                            option.value = municipio.municipio_id;
                            option.textContent = municipio.municipio;
                            municipioSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error al obtener los municipios:', error);
                    });
            }
        });
    </script>
@endsection
