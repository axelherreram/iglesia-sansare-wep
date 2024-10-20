@extends('layouts.app')

@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <style>
        p.small.text-muted {
            display: none
        }
    </style>
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header bg-transparent">
                    <a href="dashboard" class="btn btn-sm  btn-primary-ig-r">
                        <i class="font-22 lni lni-arrow-left"></i>
                        Regresar
                    </a>
                    <h2 class="mt-3">Listado de casamientos</h2>
                    <hr>
                    <form action="{{ route('casamientos.index') }}" method="GET" class="row g-3 align-items-center">
                        <div class="col-md-6 d-md-flex">
                            <div class="me-2 flex-fill">
                                <label for="nombre_esposo" class="form-label">Esposo:</label>
                                <input type="text" class="form-control" id="nombre_esposo" name="nombre_esposo"
                                    value="{{ request('nombre_esposo') }}" placeholder="Nombre">
                            </div>
                            <div class="flex-fill">
                                <label for="nombre_esposa" class="form-label">Esposa:</label>
                                <input type="text" class="form-control" id="nombre_esposa" name="nombre_esposa"
                                    value="{{ request('nombre_esposa') }}" placeholder="Nombre">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="anio" class="form-label">Año</label>
                            <input type="number" class="form-control" id="anio" name="anio"
                                value="{{ request('anio') }}" placeholder="2024" min="1900" max="2100">
                        </div>

                        <div class="col-md-3">
                            <label for="buscar" class="form-label d-block">&nbsp;</label>
                            <button class="btn btn-primary-ig w-100" type="submit">Buscar</button>
                        </div>
                    </form>

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
                                @forelse ($casamientos as $casamiento)
                                    <tr>
                                        <td>{{ $casamiento->NoPartida }} - {{ $casamiento->folio }}</td>
                                        <td>{{ $casamiento->nombre_esposo }}</td>
                                        <td>{{ $casamiento->nombre_esposa }}</td>
                                        <td>{{ $casamiento->nombre_parroco }}</td>
                                        <td>{{ Date::parse($casamiento->fecha_casamiento)->format('Y-m-d') }}</td>
                                        <td><a href="{{ route('casamientos.show',$casamiento->casamiento_id) }}" class="btn btn-primary-ig btn-sm">Visualizar</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No se encontraron resultados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Paginación -->
                    <div class="pagination-container">
                        <div class="d-flex justify-content-center mt-4">
                            {{ $casamientos->links() }}
                        </div>
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
