@extends('layouts.app')

@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <style>
        /* Card and container styles */
        .personas-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            
        }

        .btn-view,
        .btn-edit {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .btn-view {
            background-color: #3498db;
            color: #fff;
        }

        .btn-edit {
            background-color: #f1c40f;
            color: #fff;
        }

        .personas-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        /* Header styles */
        .card-header {
            background: linear-gradient(135deg, #4a6cf7 0%, #2b3cf7 100%);
            color: white;
            padding: 20px 25px;
            position: relative;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .back-button {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            padding: 0;
        }

        /* Formulario de búsqueda */
        .search-section {
            padding: 20px 25px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
        }

        .search-input,
        .filter-select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .search-input:focus,
        .filter-select:focus {
            border-color: #4a6cf7;
            box-shadow: 0 0 0 3px rgba(74, 108, 247, 0.2);
            outline: none;
        }

        .btn-primary {
            background-color: #4a6cf7;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #2b3cf7;
            transform: translateY(-2px);
        }

        /* Table styles */
        .table-container {
            padding: 20px 25px;
        }

        .personas-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .personas-table th {
            background-color: #f4f6f9;
            color: #555;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #eee;
        }

        .personas-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            color: #333;
            font-size: 0.95rem;
        }

        .personas-table tbody tr {
            transition: all 0.2s ease;
        }

        .personas-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .personas-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Action buttons */
        .btn-view {
            background-color: #e6f0ff;
            color: #4a6cf7;
            border: none;
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s ease;
        }

        .btn-view:hover {
            background-color: #d6e4ff;
            transform: translateY(-2px);
        }

        /* Empty state */
        .empty-state {
            padding: 40px;
            text-align: center;
        }

        .empty-state-icon {
            font-size: 3rem;
            color: #ccc;
            margin-bottom: 15px;
        }

        .empty-state-text {
            color: #888;
            font-size: 1.1rem;
        }

        /* Pagination */
        .pagination-container {
            padding: 20px 25px;
            display: flex;
            justify-content: center;
            border-top: 1px solid #eee;
        }

        /* Action buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .personas-table {
                display: block;
                overflow-x: auto;
            }

            .personas-table th,
            .personas-table td {
                padding: 12px 10px;
                font-size: 0.85rem;
            }

            .btn-view {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
        }
    </style>
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="personas-card">
                <div class="card-header p-4">
                    <a href="dashboard" class="back-button">
                        <i class="lni lni-arrow-left"></i> Regresar
                    </a>
                    <h2 class="page-title" style="color: white">Listado de Bautizos</h2>
                </div>
                <div class="search-section">
                    <h5>Buscar Bautizo:</h5>
                    <form action="{{ route('bautizos.index') }}" method="GET">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="text" class="search-input" name="search" placeholder="Nombre completo o CUI"
                                    value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>



                <div class="table-container">
                    @if(count($bautizos) > 0)
                        <div class="table-responsive">
                            <table class="personas-table">
                                <thead>
                                    <tr>
                                        <th>Correlativo</th>
                                        <th>Persona Bautizada</th>
                                        <th>Sacerdote</th>
                                        <th>Fecha Bautizo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bautizos as $bautizo)
                                        <tr>
                                            <td>{{ $bautizo->NoPartida }} - {{ $bautizo->folio }}</td>
                                            <td>{{ $bautizo->personaBautizada->nombres }}
                                                {{ $bautizo->personaBautizada->apellidos }}
                                            </td>
                                            <td>{{ $bautizo->sacerdote->nombres }} {{ $bautizo->sacerdote->apellidos }}</td>
                                            <td>{{ \Carbon\Carbon::parse($bautizo->fecha_bautizo)->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="{{ route('bautizos.show', $bautizo->bautizo_id) }}" class="btn-view">
                                                        <i class="lni lni-eye"></i> Ver
                                                    </a>
                                                    <a href="{{ route('bautizos.edit', $bautizo->bautizo_id) }}" class="btn-edit">
                                                        <i class="lni lni-pencil"></i> Editar
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-state-icon">
                                <i class="lni lni-users"></i>
                            </div>
                            <p class="empty-state-text">No se encontraron registros de bautizos.</p>
                        </div>
                    @endif
                </div>

                <div class="pagination-container">
                    <div class="d-flex justify-content-center mt-4">
                        {{ $bautizos->onEachSide(1)->links() }}
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

        @if (session('no_results'))
            Swal.fire({
                icon: 'info',
                title: 'Sin resultados',
                text: '{{ session('no_results') }}',
                showConfirmButton: true,
                confirmButtonText: 'Aceptar'
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