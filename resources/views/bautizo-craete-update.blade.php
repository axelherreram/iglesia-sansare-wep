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
                    <a href="dashboard" class="btn btn-sm btn-outline-primary">
                        <i class="lni lni-arrow-left"></i> Regresar
                    </a>
                    <h3 class="mt-3">Crear nuevo bautizo</h3>
                </div>

                <form class="p-4">
                    <!-- Fecha del Bautizo -->
                    <div class="row mb-3">
                        <label for="fecha" class="col-sm-3 col-form-label">Fecha del Bautizo:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha" name="fecha" aria-label="Fecha del bautizo">
                        </div>
                    </div>
                    
                    <!-- Datos Persona Bautizada -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_bautizado" class="form-label">Nombres de la persona bautizada:</label>
                            <input type="text" class="form-control" id="nombre_bautizado" name="nombre_bautizado" aria-label="Nombres de la persona bautizada">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_bautizado" class="form-label">Apellidos de la persona bautizada:</label>
                            <input type="text" class="form-control" id="apellido_bautizado" name="apellido_bautizado" aria-label="Apellidos de la persona bautizada">
                        </div>
                    </div>
                    
                    <!-- Fecha de Nacimiento -->
                    <div class="row mb-3">
                        <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha de nacimiento:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" aria-label="Fecha de nacimiento de la persona bautizada">
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
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="municipio" class="form-label">Municipio:</label>
                            <select class="form-control" id="municipio" name="municipio" aria-label="Seleccione el municipio">
                                <option value="">Seleccione el municipio</option>
                                <option value="municipio1">Municipio 1</option>
                                <option value="municipio2">Municipio 2</option>
                                <option value="municipio3">Municipio 3</option>
                                <!-- Agrega más opciones según sea necesario -->
                            </select>
                        </div>
                    </div>
                    
                    <!-- Datos Padres -->
                    <span><strong>Datos padres</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_padre" class="form-label">Nombre del padre:</label>
                            <input type="text" class="form-control" id="nombre_padre" name="nombre_padre" aria-label="Nombre del padre">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_padre" class="form-label">Apellidos del padre:</label>
                            <input type="text" class="form-control" id="apellido_padre" name="apellido_padre" aria-label="Apellidos del padre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_madre" class="form-label">Nombre de la madre:</label>
                            <input type="text" class="form-control" id="nombre_madre" name="nombre_madre" aria-label="Nombre de la madre">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_madre" class="form-label">Apellidos de la madre:</label>
                            <input type="text" class="form-control" id="apellido_madre" name="apellido_madre" aria-label="Apellidos de la madre">
                        </div>
                    </div>

                    <!-- Datos Padrinos -->
                    <span><strong> Datos padrinos</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_madrina" class="form-label">Nombre de la madrina:</label>
                            <input type="text" class="form-control" id="nombre_madrina" name="nombre_madrina" aria-label="Nombre de la madrina">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_madrina" class="form-label">Apellidos de la madrina:</label>
                            <input type="text" class="form-control" id="apellido_madrina" name="apellido_madrina" aria-label="Apellidos de la madrina">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_padrino" class="form-label">Nombre del padrino:</label>
                            <input type="text" class="form-control" id="nombre_padrino" name="nombre_padrino" aria-label="Nombre del padrino">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_padrino" class="form-label">Apellidos del padrino:</label>
                            <input type="text" class="form-control" id="apellido_padrino" name="apellido_padrino" aria-label="Apellidos del padrino">
                        </div>
                    </div>
                    
                    <!-- Botón de Guardar -->
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary w-100 w-sm-25">Guardar</button>
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
