@extends('layouts.app')

@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <style>
        .card {
            max-width: 800px;
            margin: 0 auto;
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
                    <h3 class="mt-3">Crear nueva primera comunión </h3>
                </div>

                <form class="p-4">
                    <!-- Correlativo y Fecha del Comunión -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="correlativo" class="form-label">Partida No:</label>
                            <input type="text" class="form-control" id="correlativo" name="correlativo">
                        </div>
                        <div class="col-sm-6">
                            <label for="fecha_bautizo" class="form-label">Fecha de Comunión:</label>
                            <input type="date" class="form-control" id="fecha_bautizo" name="fecha_bautizo">
                        </div>
                    </div>

                    <!-- Datos Persona de la primera comunión -->
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="nombre_comunion" class="form-label">Nombre de la persona de la primera
                                comunión:</label>
                            <input type="text" class="form-control" id="nombre_comunion" name="nombre_comunion"
                                aria-label="Nombre de la persona de la primera comunión">
                        </div>
                    </div>
                    <span> <strong>Datos Sacerdote</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="nombre_comunion" class="form-label">Nombre de la persona de la primera
                                comunión:</label>
                            <input type="text" class="form-control" id="nombre_comunion" name="nombre_comunion"
                                aria-label="Nombre de la persona de la primera comunión">
                        </div>
                    </div>
                    <span> <strong>Datos padres</strong></span>
                    <hr>
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

                    <!-- Ubicación -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="departamento" class="form-label">Departamento:</label>
                            <select class="form-control" id="departamento" name="departamento"
                                aria-label="Seleccione el departamento">
                                <option value="">Seleccione el departamento</option>
                                <option value="departamento1">Departamento 1</option>
                                <option value="departamento2">Departamento 2</option>
                                <option value="departamento3">Departamento 3</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="municipio" class="form-label">Municipio:</label>
                            <select class="form-control" id="municipio" name="municipio"
                                aria-label="Seleccione el municipio">
                                <option value="">Seleccione el municipio</option>
                                <option value="municipio1">Municipio 1</option>
                                <option value="municipio2">Municipio 2</option>
                                <option value="municipio3">Municipio 3</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary w-25 w-sm-100">Guardar</button>
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