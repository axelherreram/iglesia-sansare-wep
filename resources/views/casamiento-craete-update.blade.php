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
                    <h3 class="mt-3">Crear nuevo casamiento</h3>
                </div>
                <form class="p-4">
                    <!-- Fecha del Casamiento -->
                    <div class="row mb-3">
                        <label for="fecha" class="col-sm-3 col-form-label">Fecha del casamiento:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha" name="fecha" aria-label="Fecha del casamiento">
                        </div>
                    </div>

                    <!-- Datos Testigos -->
                    <span><strong>Datos testigos</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_testigo1" class="form-label">Nombres del primer testigo:</label>
                            <input type="text" class="form-control" id="nombre_testigo1" name="nombre_testigo1" aria-label="Nombres del primer testigo">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_testigo1" class="form-label">Apellidos del primer testigo:</label>
                            <input type="text" class="form-control" id="apellido_testigo1" name="apellido_testigo1" aria-label="Apellidos del primer testigo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_testigo2" class="form-label">Nombres del segundo testigo:</label>
                            <input type="text" class="form-control" id="nombre_testigo2" name="nombre_testigo2" aria-label="Nombres del segundo testigo">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_testigo2" class="form-label">Apellidos del segundo testigo:</label>
                            <input type="text" class="form-control" id="apellido_testigo2" name="apellido_testigo2" aria-label="Apellidos del segundo testigo">
                        </div>
                    </div>

                    <!-- Datos del Esposo -->
                    <span><strong>Datos del esposo</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_esposo" class="form-label">Nombres del esposo:</label>
                            <input type="text" class="form-control" id="nombre_esposo" name="nombre_esposo" aria-label="Nombres del esposo">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_esposo" class="form-label">Apellidos del esposo:</label>
                            <input type="text" class="form-control" id="apellido_esposo" name="apellido_esposo" aria-label="Apellidos del esposo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="edad_esposo" class="col-form-label">Edad del esposo:</label>
                            <input type="number" class="form-control" id="edad_esposo" name="edad_esposo" min="0" aria-label="Edad del esposo">
                        </div>
                        <div class="col-sm-6">
                            <label for="feligres_esposo" class="col-form-label">Feligres de:</label>
                            <input type="text" class="form-control" id="feligres_esposo" name="feligres_esposo" aria-label="Feligres de">
                        </div>
                    </div>

                    <!-- Familia del Esposo -->
                    <span><strong>Familia del esposo</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_padre_esposo" class="form-label">Nombres del padre:</label>
                            <input type="text" class="form-control" id="nombre_padre_esposo" name="nombre_padre_esposo" aria-label="Nombres del padre del esposo">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_padre_esposo" class="form-label">Apellidos del padre:</label>
                            <input type="text" class="form-control" id="apellido_padre_esposo" name="apellido_padre_esposo" aria-label="Apellidos del padre del esposo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_madre_esposo" class="form-label">Nombres de la madre:</label>
                            <input type="text" class="form-control" id="nombre_madre_esposo" name="nombre_madre_esposo" aria-label="Nombres de la madre del esposo">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_madre_esposo" class="form-label">Apellidos de la madre:</label>
                            <input type="text" class="form-control" id="apellido_madre_esposo" name="apellido_madre_esposo" aria-label="Apellidos de la madre del esposo">
                        </div>
                    </div>

                    <!-- Datos de la Esposa -->
                    <span><strong>Datos de la esposa</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_esposa" class="form-label">Nombres de la esposa:</label>
                            <input type="text" class="form-control" id="nombre_esposa" name="nombre_esposa" aria-label="Nombres de la esposa">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_esposa" class="form-label">Apellidos de la esposa:</label>
                            <input type="text" class="form-control" id="apellido_esposa" name="apellido_esposa" aria-label="Apellidos de la esposa">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="edad_esposa" class="col-form-label">Edad de la esposa:</label>
                            <input type="number" class="form-control" id="edad_esposa" name="edad_esposa" min="0" aria-label="Edad de la esposa">
                        </div>
                        <div class="col-sm-6">
                            <label for="feligres_esposa" class="col-form-label">Feligres de:</label>
                            <input type="text" class="form-control" id="feligres_esposa" name="feligres_esposa" aria-label="Feligres de">
                        </div>
                    </div>

                    <!-- Familia de la Esposa -->
                    <span><strong>Familia de la esposa</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_padre_esposa" class="form-label">Nombres del padre:</label>
                            <input type="text" class="form-control" id="nombre_padre_esposa" name="nombre_padre_esposa" aria-label="Nombres del padre de la esposa">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_padre_esposa" class="form-label">Apellidos del padre:</label>
                            <input type="text" class="form-control" id="apellido_padre_esposa" name="apellido_padre_esposa" aria-label="Apellidos del padre de la esposa">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_madre_esposa" class="form-label">Nombres de la madre:</label>
                            <input type="text" class="form-control" id="nombre_madre_esposa" name="nombre_madre_esposa" aria-label="Nombres de la madre de la esposa">
                        </div>
                        <div class="col-sm-6">
                            <label for="apellido_madre_esposa" class="form-label">Apellidos de la madre:</label>
                            <input type="text" class="form-control" id="apellido_madre_esposa" name="apellido_madre_esposa" aria-label="Apellidos de la madre de la esposa">
                        </div>
                    </div>
                    
                    <!-- Botón de Guardar -->
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
