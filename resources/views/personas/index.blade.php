@extends('layouts.app')

@section('style')
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

        /* Formulario */
        .search-section {
            padding: 20px 25px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
            display: flex;
            gap: 15px;
            align-items: center;
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

        .search-input {
            max-width: 300px;
        }

        .filter-select {
            max-width: 200px;
        }

        /* Botón de búsqueda */
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

        /* Status badge */
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            text-align: center;
        }

        .status-active {
            background-color: #e6f7ee;
            color: #0d9f4f;
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

        .filter-select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .filter-select:focus {
            border-color: #4a6cf7;
            box-shadow: 0 0 0 3px rgba(74, 108, 247, 0.2);
            outline: none;
        }

        /* Responsive styles */
        @media (max-width: 992px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .back-button {
                align-self: flex-start;
            }
        }

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

            .btn-view,
            .btn-edit {
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
                    <a href="/" class="back-button">
                        <i class="lni lni-arrow-left"></i> Regresar
                    </a>
                    <h2 class="page-title" style="color: white">Listado de Personas</h2>
                    <div></div> <!-- Empty div for flex spacing -->
                </div>

                <form action="{{ route('personas.index') }}" method="GET" class="p-3">
                    <h5>Buscar personas por CUI, nombre, apellido y filtrado por tipo de persona</h5>
                    <div class="search-section">
                        <input type="text" name="search" class="search-input"
                            placeholder="Buscar persona por nombre, apellido o DPI..." value="{{ request('search') }}">
                        <select class="filter-select" name="tipo_persona" id="tipo_persona">
                            <option value="">Seleccionar Tipo de Persona</option>
                            <option value="F" {{ request('tipo_persona') == 'F' ? 'selected' : '' }}>Feligrés</option>
                            <option value="S" {{ request('tipo_persona') == 'S' ? 'selected' : '' }}>Sacerdote</option>
                            <option value="O" {{ request('tipo_persona') == 'O' ? 'selected' : '' }}>Obispo</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>


                <div class="table-container">
                    @if(count($personas) > 0)
                        <div class="table-responsive">
                            <table class="personas-table">
                                <thead>
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>DPI/CUI</th>
                                        <th>Municipio</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($personas as $persona)
                                        <tr>
                                            <td>{{ $persona->nombres }}</td>
                                            <td>{{ $persona->apellidos }}</td>
                                            <td>{{ $persona->dpi_cui }}</td>
                                            <td>{{ $persona->municipio->municipio }}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="{{ route('personas.show', $persona->persona_id) }}" class="btn-view">
                                                        <i class="lni lni-eye"></i> Ver
                                                    </a>
                                                    <a href="{{ route('personas.edit', $persona->persona_id) }}" class="btn-edit">
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
                            <p class="empty-state-text">No hay personas registradas en el sistema.</p>
                        </div>
                    @endif
                </div>

                @if(isset($personas) && method_exists($personas, 'links'))
                    <div class="pagination-container">
                        {{ $personas->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection