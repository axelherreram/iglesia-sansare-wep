@extends('layouts.app')

@section('style')
    <style>
        p.small.text-muted {
            display: none;
        }
        .btn-primary-ig-r {
            font-size: 14px;
            padding: 8px 15px;
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 15px;
            text-align: center;
        }
        .table thead {
            background-color: #f4f6f9;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .action-buttons a,
        .action-buttons form {
            margin-right: 5px;
        }
        .action-buttons a i,
        .action-buttons button i {
            margin-right: 5px;
        }
    </style>
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header bg-transparent">
                    <a href="/" class="btn btn-sm btn-primary-ig-r">
                        <i class="font-22 lni lni-arrow-left"></i>
                        Regresar
                    </a>
                    <h2 class="mt-3">Lista de Personas</h2>
                    <hr>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>DPI/CUI</th>
                                <th>Municipio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($personas as $persona)
                                <tr>
                                    <td>{{ $persona->nombres }}</td>
                                    <td>{{ $persona->apellidos }}</td>
                                    <td>{{ $persona->dpi_cui }}</td>
                                    <td>{{ $persona->municipio->municipio }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('personas.show', $persona->persona_id) }}" class="btn btn-info btn-sm">
                                            <i class="lni lni-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('personas.edit', $persona->persona_id) }}" class="btn btn-warning btn-sm">
                                            <i class="lni lni-pencil"></i> Editar
                                        </a>
                                        <form action="{{ route('personas.destroy', $persona->persona_id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="lni lni-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
