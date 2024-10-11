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
                    <h3 class="mt-3">Crear nueva persona</h3>
                </div>
                <form class="p-4">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_comunion" class="form-label">Nombre*:</label>
                            <input type="text" class="form-control" id="nombre_comunion" name="nombre_comunion"
                                aria-label="Nombre de la persona de la primera comunión">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_comunion" class="form-label">Apellidos*:</label>
                            <input type="text" class="form-control" id="apellido_comunion" name="apellido_comunion"
                                aria-label="Apellidos de la persona de la primera comunión">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_comunion" class="form-label">Dpi:</label>
                            <input type="text" class="form-control" id="nombre_comunion" name="nombre_comunion"
                                aria-label="Nombre de la persona de la primera comunión">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_comunion" class="form-label">Numero de telefono:</label>
                            <input type="text" class="form-control" id="apellido_comunion" name="apellido_comunion"
                                aria-label="Apellidos de la persona de la primera comunión">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="fecha" class="col-sm-3 col-form-label">Fecha de la nacimiento*:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha" name="fecha" aria-label="Fecha de la comunión">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="departamento" class="form-label">Departamento:</label>
                            <select class="form-control" id="departamento" name="departamento"
                                aria-label="Seleccione el departamento">
                                <option value="">Seleccione el departamento</option>
                                <option value="departamento1">Departamento 1</option>
                                <option value="departamento2">Departamento 2</option>
                                <option value="departamento3">Departamento 3</option>
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
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="departamento" class="form-label">Madre:</label>
                            <select class="form-control" id="departamento" name="departamento"
                                aria-label="Seleccione el departamento">
                                <option value="">Seleccione madre</option>
                                <option value="departamento1">Anastasia</option>
                                <option value="departamento2">Lucrecia</option>
                                <option value="departamento3">Sofia</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="municipio" class="form-label">Padre:</label>
                            <select class="form-control" id="municipio" name="municipio"
                                aria-label="Seleccione el municipio">
                                <option value="">Seleccione el padre</option>
                                <option value="municipio1">Juan</option>
                                <option value="municipio2">francisco</option>
                                <option value="municipio3">Lucas</option>
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
