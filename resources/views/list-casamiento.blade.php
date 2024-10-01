@extends('layouts.app')

@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header bg-transparent">
                    <a href="dashboard" class=" text-primary">
                        <i class="font-22 lni lni-arrow-left"></i>
                        Regresar
                    </a>
                    <h2 class="mt-3">Listado de casamientos</h2>
                    <hr>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6 d-md-flex">
                            <div class="me-2 flex-fill">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                            </div>
                            <div class="flex-fill">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" placeholder="Apellido">
                            </div>
                        </div>

                        <!-- Input de fecha en su propia columna -->
                        <div class="col-md-3">
                            <label for="anio" class="form-label">Año</label>
                            <input type="number" class="form-control" id="anio" placeholder="2024" min="1900"
                                max="2100">
                        </div>

                        <!-- Botón de Buscar -->
                        <div class="col-md-3">
                            <label for="buscar" class="form-label d-block">&nbsp;</label>
                            <button class="btn btn-primary  w-100">Buscar</button>
                        </div>
                    </div>
                </div>

                <div class="card-body text-center">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 mx-auto">
                            <thead class="table-light">
                                <tr>
                                    <th>Correlativo</th>
                                    <th>Nombre esposo</th>
                                    <th>Nombre esposa</th>
                                    <th>Sacerdote</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>Juan Carlos Pérez García</td>
                                    <td>Juan Carlos Pérez García</td>
                                    <td>Padre Gabriel Morales</td>
                                    <td>03 Feb 2020</td>
                                    <td><a href="#" class="btn btn-primary btn-sm">Visualizar</a></td>
                                </tr>
                                <tr>
                                    <td>002</td>
                                    <td>Maria Fernanda López Rodríguez</td>
                                    <td>Juan Carlos Pérez García</td>
                                    <td>Padre Gabriel Morales</td>
                                    <td>05 Feb 2020</td>
                                    <td><a href="#" class="btn btn-primary btn-sm">Visualizar</a></td>
                                </tr>
                                <tr>
                                    <td>003</td>
                                    <td>Carlos Andrés García Ramírez</td>
                                    <td>Juan Carlos Pérez García</td>
                                    <td>Padre Miguel Ángel Torres</td>
                                    <td>06 Feb 2020</td>
                                    <td><a href="#" class="btn btn-primary btn-sm">Visualizar</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
