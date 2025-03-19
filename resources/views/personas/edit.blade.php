@extends('layouts.app')

@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10 shadow-lg">
            <div class="card-header bg-transparent">
                <h2 class="mt-3">Editar Persona</h2>
                <hr>
            </div>

            <div class="card-body">
                <form action="{{ route('personas.update', $persona->persona_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campo de Nombres -->
                    <div class="form-group row mb-3">
                        <label for="nombres" class="col-md-4 col-form-label text-md-right">Nombres:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-md" id="nombres" name="nombres" value="{{ $persona->nombres }}" required>
                        </div>
                    </div>

                    <!-- Campo de Apellidos -->
                    <div class="form-group row mb-3">
                        <label for="apellidos" class="col-md-4 col-form-label text-md-right">Apellidos:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-md" id="apellidos" name="apellidos" value="{{ $persona->apellidos }}" required>
                        </div>
                    </div>

                    <!-- Campo de DPI/CUI -->
                    <div class="form-group row mb-3">
                        <label for="dpi_cui" class="col-md-4 col-form-label text-md-right">DPI/CUI:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-md" id="dpi_cui" name="dpi_cui" value="{{ $persona->dpi_cui }}" required>
                        </div>
                    </div>

                    <!-- Campo de Municipio -->
                    <div class="form-group row mb-3">
                        <label for="municipio_id" class="col-md-4 col-form-label text-md-right">Municipio:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-md" id="municipio_search" placeholder="Buscar Municipio" autocomplete="off">
                            <select class="form-control form-control-md mt-2" id="municipio_id" name="municipio_id" required>
                                <option value="">Seleccione Municipio</option>
                                @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id }}" {{ $persona->municipio_id == $municipio->id ? 'selected' : '' }}>{{ $municipio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Campo de Dirección -->
                    <div class="form-group row mb-3">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-md" id="direccion" name="direccion" value="{{ $persona->direccion }}" required>
                        </div>
                    </div>

                    <!-- Campo de Fecha de Nacimiento y Sexo -->
                    <div class="form-group row mb-3">
                        <div class="col-md-6">
                            <label for="fecha_nacimiento" class="col-form-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control form-control-md" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $persona->fecha_nacimiento }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="sexo" class="col-form-label">Sexo:</label>
                            <select class="form-control form-control-md" id="sexo" name="sexo" required>
                                <option value="Masculino" {{ $persona->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                <option value="Femenino" {{ $persona->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                <option value="Otro" {{ $persona->sexo == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>
                    </div>

                    <!-- Campo de Teléfono y Tipo de Persona -->
                    <div class="form-group row mb-3">
                        <div class="col-md-6">
                            <label for="num_telefono" class="col-form-label">Número de Teléfono:</label>
                            <input type="text" class="form-control form-control-md" id="num_telefono" name="num_telefono" value="{{ $persona->num_telefono }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tipo_persona" class="col-form-label">Tipo de Persona:</label>
                            <select class="form-control form-control-md" id="tipo_persona" name="tipo_persona" required>
                                <option value="F" {{ $persona->tipo_persona == 'F' ? 'selected' : '' }}>Feligrés</option>
                                <option value="S" {{ $persona->tipo_persona == 'S' ? 'selected' : '' }}>Sacerdote</option>
                                <option value="O" {{ $persona->tipo_persona == 'O' ? 'selected' : '' }}>Obispo</option>
                            </select>
                        </div>
                    </div>

                    <!-- Campos para Identificación de Padres y Padrinos -->
                    <div class="form-group row mb-3">
                        <label for="padre_id" class="col-md-4 col-form-label text-md-right">Padre:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-md" id="padre_id" name="padre_id" value="{{ $persona->padre_id }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="madre_id" class="col-md-4 col-form-label text-md-right">Madre:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-md" id="madre_id" name="madre_id" value="{{ $persona->madre_id }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="padrino_id" class="col-md-4 col-form-label text-md-right">Padrino:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-md" id="padrino_id" name="padrino_id" value="{{ $persona->padrino_id }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="madrina_id" class="col-md-4 col-form-label text-md-right">Madrina:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-md" id="madrina_id" name="madrina_id" value="{{ $persona->madrina_id }}">
                        </div>
                    </div>

                    <!-- Botón para Actualizar -->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-md btn-primary px-5">
                                Actualizar Persona
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script para la búsqueda de municipios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#municipio_search').on('input', function() {
            var query = $(this).val();
            
            if(query.length >= 2) {
                $.ajax({
                    url: '{{ route('municipios.search') }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        $('#municipio_id').empty().append('<option value="">Seleccione Municipio</option>');
                        data.forEach(function(municipio) {
                            $('#municipio_id').append('<option value="' + municipio.id + '">' + municipio.nombre + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
@endsection
@section('script')
    <!--plugins-->
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/chartjs/js/chart.js"></script>
    <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/plugins/morris/js/morris.js"></script>
    <script src="assets/js/index2.js"></script>
@endsection
