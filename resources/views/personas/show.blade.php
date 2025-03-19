@extends('layouts.app')

@section('style')
    <style>
        /* General styling */
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
        }

        .card-header h2 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .btn-primary-ig-r {
            padding: 8px 15px;
            font-size: 14px;
        }

        .btn-primary-ig {
            margin-top: 15px;
            font-size: 14px;
            width: 100%;
        }

        .card-body .row {
            margin-bottom: 15px;
        }

        .card-body .row .col-md-6 {
            padding-right: 20px;
        }

        .strong-label {
            font-weight: 600;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .value-label {
            color: #666;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .action-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        /* Adjust card body margins */
        .card-body p {
            font-size: 1rem;
            margin: 5px 0;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-header h2 {
                font-size: 1.2rem;
            }

            .btn-primary-ig {
                width: 100%;
            }

            .strong-label {
                font-size: 14px;
            }

            .value-label {
                font-size: 14px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card radius-10">
                <div class="card-header bg-transparent">
                    <a href="{{ route('personas.index') }}" class="btn btn-sm btn-primary-ig-r">
                        <i class="font-22 lni lni-arrow-left"></i> Regresar
                    </a>
                    <h2 class="mt-3">Detalles de Persona</h2>
                    <hr>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="strong-label">Nombres:</span>
                            <p class="value-label">{{ $persona->nombres }}</p>
                        </div>
                        <div class="col-md-6">
                            <span class="strong-label">Apellidos:</span>
                            <p class="value-label">{{ $persona->apellidos }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <span class="strong-label">DPI/CUI:</span>
                            <p class="value-label">{{ $persona->dpi_cui }}</p>
                        </div>
                        <div class="col-md-6">
                            <span class="strong-label">Municipio:</span>
                            <p class="value-label">{{ $persona->municipio->municipio }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <span class="strong-label">Fecha de Nacimiento:</span>
                            <p class="value-label">{{ \Carbon\Carbon::parse($persona->fecha_nacimiento)->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <span class="strong-label">Sexo:</span>
                            <p class="value-label">
                                @if ($persona->sexo == 'M')
                                    Masculino
                                @elseif($persona->sexo == 'F')
                                    Femenino
                                @else
                                    No especificado
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <span class="strong-label">Número de Teléfono:</span>
                            <p class="value-label">{{ $persona->num_telefono ?? 'No disponible' }}</p>
                        </div>
                        <div class="col-md-6">
                            <span class="strong-label">Tipo de Persona:</span>
                            <p class="value-label">{{ $persona->tipo_persona }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <span class="strong-label">Dirección:</span>
                            <p class="value-label">{{ $persona->direccion ?? 'No disponible' }}</p>
                        </div>
                        <div class="col-md-6">
                            <span class="strong-label">Padre:</span>
                            <p class="value-label">{{ $persona->padre_id ?? 'No disponible' }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <span class="strong-label">Madre:</span>
                            <p class="value-label">{{ $persona->madre_id ?? 'No disponible' }}</p>
                        </div>
                        <div class="col-md-6">
                            <span class="strong-label">Padrino:</span>
                            <p class="value-label">{{ $persona->padrino_id ?? 'No disponible' }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <span class="strong-label">Madrina:</span>
                            <p class="value-label">{{ $persona->madrina_id ?? 'No disponible' }}</p>
                        </div>
                    </div>

                    <!-- Botón de acción -->
                    <div class="action-buttons">
                        <a href="{{ route('personas.edit', $persona->persona_id) }}" class="btn btn-primary-ig">
                            <i class="lni lni-pencil"></i> Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
