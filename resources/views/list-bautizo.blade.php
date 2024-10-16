@extends('layouts.app')

@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <style>
        p.small.text-muted{
            display: none
        }
    </style>
    @endsection


    @section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header bg-transparent">
                    <a href="dashboard" class="btn btn-sm btn-primary-ig-r">
                        <i class="font-22 lni lni-arrow-left"></i>
                        Regresar
                    </a>
                    <h2 class="mt-3">Listado de bautizos</h2>
                    <hr>
                    <form action="{{ route('bautizos.index') }}" method="GET">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6 d-md-flex">
                                <div class="me-2 flex-fill">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ request('nombre') }}">
                                </div>
                               
                            </div>
                    
                            <!-- Input de fecha en su propia columna -->
                            <div class="col-md-3">
                                <label for="anio" class="form-label">Año</label>
                                <input type="number" class="form-control" id="anio" name="anio" placeholder="2024" min="1900" max="{{ date('Y') }}" value="{{ request('anio') }}">
                            </div>
                    
                            <!-- Botón de Buscar -->
                            <div class="col-md-3">
                                <label for="buscar" class="form-label d-block">&nbsp;</label>
                                <button class="btn btn-primary-ig w-100">Buscar</button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Tabla de bautizos -->
                    <div class="table-responsive">
                        <table class="table align-middle mb-0 mx-auto">
                            <thead class="table-light">
                                <tr>
                                    <th>Correlativo</th>
                                    <th>Persona bautizada</th>
                                    <th>Sacerdote</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bautizos as $bautizo)
                                    <tr>
                                        <td>{{ $bautizo->NoPartida }} - {{ $bautizo->folio }}</td>
                                        <td>{{ $bautizo->nombre_persona_bautizada }}</td>
                                        <td>{{ $bautizo->nombre_sacerdote }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bautizo->fecha_bautizo)->format('d M Y') }}</td>
                                        <td><a href="#" class="btn btn-primary-ig btn-sm">Visualizar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        <div class="d-flex justify-content-center mt-4">
                            {{ $bautizos->onEachSide(1)->links() }}  
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        @endif
    </script>

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
