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
                    <a href="dashboard" class="text-primary">
                        <i class="font-22 lni lni-arrow-left"></i>
                        Regresar
                    </a>
                    <h3 class="mt-3">Crear nueva confirmación</h3>
                </div>

                <form class="p-4">
                    <div class="row mb-3">
                        <label for="fecha" class="col-sm-3 col-form-label">Fecha de la confirmación:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="delegado" class="col-sm-3 col-form-label">El Excmo. Monseñor (ó delegado):</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="delegado" name="delegado">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="confirmado" class="col-sm-3 col-form-label">Confirmó el Sacramento de la CONFIRMACIÓN a:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="confirmado" name="confirmado">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="edad" class="col-sm-3 col-form-label">Edad:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="edad" name="edad" min="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="parroquia_bautismo" class="col-sm-3 col-form-label">Bautizado en la Parroquia:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="parroquia_bautismo" name="parroquia_bautismo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="padre" class="col-sm-3 col-form-label">Hijo(a) de:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="padre" name="padre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="madre" class="col-sm-3 col-form-label">Y de:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="madre" name="madre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="nombre_padre" class="form-label">Nombres del padrino:</label>
                            <input type="text" class="form-control" id="nombre_padre" name="nombre_padre">
                        </div>
                        <div class="col-sm-6">
                            <label for="nombre_madre" class="form-label">Apellidos de la madrina:</label>
                            <input type="text" class="form-control" id="nombre_madre" name="nombre_madre">
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
