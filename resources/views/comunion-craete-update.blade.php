@extends('layouts.app')

@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <style>
        .card{
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
                    <a href="dashboard" class="text-primary">
                        <i class="font-22 lni lni-arrow-left"></i>
                        Regresar
                    </a>
                    <h3 class="mt-3">Crear nueva comunión</h3>
                </div>

                <form class="p-4">
                    <div class="row mb-3">
                        <label for="nombre_comunion" class="col-sm-3 col-form-label">Nombre de la persona que recibe la comunión:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_comunion" name="nombre_comunion">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nombre_participe" class="col-sm-3 col-form-label">Nombre de la persona participante:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_participe" name="nombre_participe">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fecha_comunion" class="col-sm-3 col-form-label">Fecha de la comunión:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha_comunion" name="fecha_comunion">
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
