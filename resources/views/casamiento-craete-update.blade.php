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
                    <!-- Correlativo y Fecha del casamiento -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="correlativo" class="form-label">Partida No:</label>
                            <input type="text" class="form-control" id="correlativo" name="correlativo">
                        </div>
                        <div class="col-sm-6">
                            <label for="fecha_casamiento" class="form-label">Fecha de casamiento:</label>
                            <input type="date" class="form-control" id="fecha_casamiento" name="fecha_casamiento">
                        </div>
                    </div>

                    <!-- Testigos -->
                    <span><strong>Testigos</strong></span>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <textarea class="form-control" id="testigos" name="testigos" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Datos del esposo -->
                    <span><strong>Datos del esposo</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_esposo" class="form-label">Nombre del esposo:</label>
                            <input type="text" class="form-control" id="nombre_esposo" name="nombre_esposo">
                        </div>
                        <div class="col-sm-6">
                            <label for="edad_esposo" class="form-label">Edad del esposo:</label>
                            <input type="number" class="form-control" id="edad_esposo" name="edad_esposo" min="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="departamento_esposo" class="form-label">Departamento:</label>
                            <select class="form-control" id="departamento_esposo" name="departamento_esposo">
                                <option value="">Seleccione el departamento</option>
                                <!-- Opciones adicionales -->
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="municipio_esposo" class="form-label">Municipio:</label>
                            <select class="form-control" id="municipio_esposo" name="municipio_esposo">
                                <option value="">Seleccione el municipio</option>
                                <!-- Opciones adicionales -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="feligresia_esposo" class="form-label">Feligres de:</label>
                            <input type="text" class="form-control" id="feligresia_esposo" name="feligresia_esposo">
                        </div>
                    </div>
                    <!-- Datos de los Padres -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_padre_esposo" class="form-label">Nombre del padre:</label>
                            <input type="text" class="form-control" id="nombre_padre_esposo" name="nombre_padre_esposo">
                        </div>
                        <div class="col-sm-6">
                            <label for="nombre_madre_esposo" class="form-label">Nombre de la madre:</label>
                            <input type="text" class="form-control" id="nombre_madre_esposo" name="nombre_madre_esposo">
                        </div>
                    </div>
                    
                    <!-- Datos de la esposa -->
                    <span><strong>Datos de la esposa</strong></span>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_esposa" class="form-label">Nombre de la esposa:</label>
                            <input type="text" class="form-control" id="nombre_esposa" name="nombre_esposa">
                        </div>
                        <div class="col-sm-6">
                            <label for="edad_esposa" class="form-label">Edad de la esposa:</label>
                            <input type of="number" class="form-control" id="edad_esposa" name="edad_esposa" min="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="departamento_esposa" class="form-label">Departamento:</label>
                            <select class="form-control" id="departamento_esposa" name="departamento_esposa">
                                <option value="">Seleccione el departamento</option>
                                <!-- Opciones adicionales -->
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="municipio_esposa" class="form-label">Municipio:</label>
                            <select class="form-control" id="municipio_esposa" name="municipio_esposa">
                                <option value="">Seleccione el municipio</option>
                                <!-- Opciones adicionales -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="feligresia_esposa" class="form-label">Feligres de:</label>
                            <input type="text" class="form-control" id="feligresia_esposa" name="feligresia_esposa">
                        </div>
                    </div>
                         <!-- Datos de los Padres -->
                         <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="nombre_padre_esposa" class="form-label">Nombre del padre:</label>
                                <input type="text" class="form-control" id="nombre_padre_esposa" name="nombre_padre_esposa">
                            </div>
                            <div class="col-sm-6">
                                <label for="nombre_madre_esposa" class="form-label">Nombre de la madre:</label>
                                <input type="text" class="form-control" id="nombre_madre_esposa" name="nombre_madre_esposa">
                            </div>
                        </div>
                    <!-- Botón de Guardar -->
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
