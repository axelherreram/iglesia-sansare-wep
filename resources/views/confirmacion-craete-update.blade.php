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
                    <a href="dashboard" class="btn btn-sm btn-outline-primary">
                        <i class="lni lni-arrow-left"></i> Regresar
                    </a>
                    <h3 class="mt-3">Crear nueva confirmación</h3>
                </div>

                <form class="p-4">
                    <!-- Correlativo y Fecha del confirmación -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="correlativo" class="form-label">Partida No:</label>
                            <input type="text" class="form-control" id="correlativo" name="correlativo">
                        </div>
                        <div class="col-sm-6">
                            <label for="fecha_confirmacion" class="form-label">Fecha de confirmación:</label>
                            <input type="date" class="form-control" id="fecha_confirmacion" name="fecha_confirmacion">
                        </div>
                    </div>

                    <span><strong>Sacerdote</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <label for="nombre_sacerdote" class="col-sm-3 col-form-label">Monseñor (ó delegado):</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_sacerdote" name="nombre_sacerdote">
                        </div>
                    </div>
                    
                    <span><strong>Persona confirmada</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <label for="nombre_confirmado" class="col-sm-3 col-form-label">Nombre de la persona confirmada:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_confirmado" name="nombre_confirmado">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-2">
                            <label for="edad_confirmado" class="form-label">Edad:</label>
                            <input type="number" class="form-control" id="edad_confirmado" name="edad_confirmado">
                        </div>
                        <div class="col-sm-10">
                            <label for="parroquia_bautizo" class="form-label">Bautizada en la Parroquía:</label>
                            <input type="text" class="form-control" id="parroquia_bautizo" name="parroquia_bautizo">
                        </div>
                    </div>

                    <span><strong>Información padres</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_padre" class="form-label">Nombre del padre:</label>
                            <input type="text" class="form-control" id="nombre_padre" name="nombre_padre" aria-label="Nombre del padre">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_madre" class="form-label">Apellidos de la madre:</label>
                            <input type="text" class="form-control" id="apellido_madre" name="apellido_madre" aria-label="Apellidos de la madre">
                        </div>
                    </div>

                    <span><strong>Datos padrinos</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_madre" class="form-label">Nombre de la madre:</label>
                            <input type="text" class="form-control" id="nombre_madre" name="nombre_madre" aria-label="Nombre de la madre">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_madre_padrinos" class="form-label">Apellidos de la madre:</label>
                            <input type="text" class="form-control" id="apellido_madre_padrinos" name="apellido_madre_padrinos" aria-label="Apellidos de la madre">
                        </div>
                    </div>

                    <!-- Ubicación -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="departamento" class="form-label">Departamento:</label>
                            <select class="form-control" id="departamento" name="departamento" aria-label="Seleccione el departamento">
                                <option value="">Seleccione el departamento</option>
                                <option value="departamento1">Departamento 1</option>
                                <option value="departamento2">Departamento 2</option>
                                <option value="departamento3">Departamento 3</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="municipio" class="form-label">Municipio:</label>
                            <select class="form-control" id="municipio" name="municipio" aria-label="Seleccione el municipio">
                                <option value="">Seleccione el municipio</option>
                                <option value="municipio1">Municipio 1</option>
                                <option value="municipio2">Municipio 2</option>
                                <option value="municipio3">Municipio 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary w-25">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!--plugins-->
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/chartjs/js/chart.js"></script>
    <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    <!--Morris JavaScript -->
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/plugins/morris/js/morris.js"></script>
    <script src="assets/js/index2.js"></script>
@endsection
