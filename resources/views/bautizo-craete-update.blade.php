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

            <form class="p-4">
                <!-- Correlativo y Fecha del Bautizo -->
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="correlativo" class="form-label">Partida No:</label>
                        <input type="text" class="form-control" id="correlativo" name="correlativo">
                    </div>
                    <div class="col-sm-6">
                        <label for="fecha_bautizo" class="form-label">Fecha de bautizo:</label>
                        <input type="date" class="form-control" id="fecha_bautizo" name="fecha_bautizo">
                    </div>
                </div>

                <!-- Datos de la persona bautizada -->
                <div class="row mb-3">
                    <label for="nombre_sacerdote" class="col-sm-3 col-form-label">Nombre de la persona bautizada:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre_sacerdote" name="nombre_sacerdote">
                    </div>
                </div>
                <!-- Fecha de Nacimiento -->
                <div class="row mb-3">
                    <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha de nacimiento:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>
                </div>

                <!-- Datos del Sacerdote -->
                <div class="row mb-3">
                    <label for="nombre_sacerdote" class="col-sm-3 col-form-label">Nombre del sacerdote:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre_sacerdote" name="nombre_sacerdote">
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

                <!-- Ubicación -->
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="departamento" class="form-label">Departamento:</label>
                        <select class="form-control" id="departamento" name="departamento">
                            <option value="">Seleccione el departamento</option>
                            <!-- Opciones adicionales -->
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="municipio" class="form-label">Municipio:</label>
                        <select class="form-control" id="municipio" name="municipio">
                            <option value="">Seleccione el municipio</option>
                            <!-- Opciones adicionales -->
                        </select>
                    </div>
                </div>

                <!-- Botón de Guardar -->
                <div class="row">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary-ig  w-25 w-sm-25" >Guardar</button>
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
