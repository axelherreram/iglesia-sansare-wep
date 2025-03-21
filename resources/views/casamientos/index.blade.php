@extends('layouts.app')

@section('style')
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <style>
        /* Card and container styles */
        .personas-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
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
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

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

        .btn-edit {
            background-color: #fff8e6;
            color: #f7a74a;
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

        .btn-edit:hover {
            background-color: #ffefd6;
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

        /* Hide pagination text */
        p.small.text-muted {
            display: none;
        }
    </style>
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="personas-card">
                <div class="card-header p-4">
                    <a href="{{ route('dashboard') }}" class="back-button">
                        <i class="lni lni-arrow-left"></i> Regresar
                    </a>
                    <h2 class="page-title" style="color: white">Listado de Casamientos</h2>
                </div>
                <div class="search-section">
                    <h5>Buscar Casamiento:</h5>
                    <form action="{{ route('casamientos.index') }}" method="GET">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="search-input" name="search"
                                    placeholder="Nombre de esposo o esposa" value="{{ request('search') }}">
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="search-input" name="year"
                                    placeholder="Año (ej: 2024)" min="1900" max="2200" value="{{ request('year') }}">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-container">
                    @if(count($casamientos) > 0)
                        <div class="table-responsive">
                            <table class="personas-table">
                                <thead>
                                    <tr>
                                        <th>Correlativo</th>
                                        <th>Esposo</th>
                                        <th>Esposa</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($casamientos as $casamiento)
                                        <tr>
                                            <td>{{ $casamiento->NoPartida }} - {{ $casamiento->folio }}</td>
                                            <td>{{ $casamiento->nombre_esposo }}</td>
                                            <td>{{ $casamiento->nombre_esposa }}</td>
                                            <td>{{ \Carbon\Carbon::parse($casamiento->fecha_casamiento)->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="{{ route('casamientos.show', $casamiento->casamiento_id) }}"
                                                        class="btn-view">
                                                        <i class="lni lni-eye"></i> Ver
                                                    </a>
                                                    <a href="{{ route('casamientos.edit', $casamiento->casamiento_id) }}"
                                                        class="btn-edit">
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
                            <p class="empty-state-text">No se encontraron registros de casamientos con los datos especificados.</p>
                        </div>
                    @endif
                </div>

                <div class="pagination-container">
                    <div class="d-flex justify-content-center mt-4">
                        {{ $casamientos->onEachSide(1)->links() }}
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
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/js/chart.js') }}"></script>
    <script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
    <!--Morris JavaScript -->
    <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morris/js/morris.js') }}"></script>
    <script src="{{ asset('assets/js/index2.js') }}"></script>
@endsection

