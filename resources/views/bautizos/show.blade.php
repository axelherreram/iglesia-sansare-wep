@extends('layouts.app')

@section('style')
    <style>
        .persona-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            max-width: 900px;
            margin: 0 auto;
        }

        .persona-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background: linear-gradient(135deg, #4a6cf7 0%, #2b3cf7 100%);
            color: white;
            padding: 20px 25px;
            position: relative;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            text-decoration: none;
            color: white;
        }

        .persona-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            padding: 0;
        }

        .persona-subtitle {
            font-size: 1rem;
            opacity: 0.8;
            margin-top: 5px;
        }

        .info-section {
            padding: 25px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-label {
            font-weight: 600;
            color: #555;
            font-size: 0.9rem;
            margin-bottom: 5px;
            display: block;
        }

        .info-value {
            color: #333;
            font-size: 1.05rem;
            padding: 8px 12px;
            background-color: #f8f9fa;
            border-radius: 6px;
            border-left: 3px solid #4a6cf7;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 25px;
            padding: 0 25px 25px;
        }

        .print-button {
            background: linear-gradient(135deg, #4a6cf7 0%, #2b3cf7 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }

        .btn-edit {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6px 12px;
            font-size: 14px;
            text-decoration: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            margin-right: 5px;
            width: 100%;
            gap: 5px;
            max-width: 300px;
            background-color: #f1c40f;
            color: #fff;
        }
        

        .print-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(43, 60, 247, 0.3);
            color: white;
            text-decoration: none;
        }

        .section-divider {
            margin: 20px 0;
            height: 1px;
            background-color: #eee;
        }

        .section-title {
            font-weight: 600;
            color: #4a6cf7;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #eee;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .card-header {
                padding: 15px 20px;
            }

            .info-section {
                padding: 15px;
            }

            .action-buttons {
                padding: 0 15px 15px;
            }
        }
    </style>
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="persona-card">
                <div class="card-header p-4" style="color: white">
                    <div class="header-content">
                        <a href="{{ route('bautizos.index') }}" class="back-button">
                            <i class="lni lni-arrow-left"></i> Regresar
                        </a>
                    </div>
                    <h2 class="persona-title mt-4" style="color: white">Registro de Bautizo</h2>
                    <p class="persona-subtitle">Partida: {{ $bautizo->NoPartida }} • Folio: {{ $bautizo->folio }}</p>
                </div>

                <div class="info-section">
                    <h3 class="section-title">Información del Bautizo</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Partida No:</span>
                            <div class="info-value">{{ $bautizo->NoPartida }}</div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Folio:</span>
                            <div class="info-value">{{ $bautizo->folio }}</div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Fecha de Bautizo:</span>
                            <div class="info-value">
                                {{ $bautizo->fecha_bautizo ? \Carbon\Carbon::parse($bautizo->fecha_bautizo)->format('d/m/Y') : 'No especificado' }}
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Aldea:</span>
                            <div class="info-value">{{ $bautizo->aldea ?: 'No especificado' }}</div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <h3 class="section-title">Persona Bautizada</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Nombre Completo:</span>
                            <div class="info-value">{{ $bautizo->personaBautizada->nombres }}
                                {{ $bautizo->personaBautizada->apellidos }}
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Edad:</span>
                            <div class="info-value">
                                {{ \Carbon\Carbon::parse($bautizo->personaBautizada->fecha_nacimiento)->age }} años
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Fecha de Nacimiento:</span>
                            <div class="info-value">
                                {{ $bautizo->personaBautizada->fecha_nacimiento ? \Carbon\Carbon::parse($bautizo->personaBautizada->fecha_nacimiento)->format('d/m/Y') : 'No especificado' }}
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <h3 class="section-title">Ubicación</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Departamento:</span>
                            <div class="info-value">{{ $bautizo->departamento->depto ?? 'No especificado' }}</div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Municipio:</span>
                            <div class="info-value">{{ $bautizo->municipio->municipio ?? 'No especificado' }}</div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <h3 class="section-title">Padres</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Padre:</span>
                            <div class="info-value">{{ $bautizo->padre->nombres }} {{ $bautizo->padre->apellidos }}</div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Madre:</span>
                            <div class="info-value">{{ $bautizo->madre->nombres }} {{ $bautizo->madre->apellidos }}</div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <h3 class="section-title">Padrinos</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Padrino:</span>
                            <div class="info-value">{{ $bautizo->padrino->nombres }} {{ $bautizo->padrino->apellidos }}
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Madrina:</span>
                            <div class="info-value">{{ $bautizo->madrina->nombres }} {{ $bautizo->madrina->apellidos }}
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <h3 class="section-title">Sacerdote</h3>
                    <div class="info-grid">
                        <div class="info-item" style="grid-column: span 2;">
                            <span class="info-label">Nombre del Sacerdote:</span>
                            <div class="info-value">{{ $bautizo->sacerdote->nombres }} {{ $bautizo->sacerdote->apellidos }}
                            </div>
                        </div>
                    </div>

                    @if($bautizo->margen)
                        <div class="section-divider"></div>

                        <h3 class="section-title">Información Adicional</h3>
                        <div class="info-grid">
                            <div class="info-item" style="grid-column: span 2;">
                                <span class="info-label">Margen:</span>
                                <div class="info-value">{{ $bautizo->margen }}</div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Botón de acción -->
                <div class="action-buttons">
                    <a href="{{ route('bautizos.edit', $bautizo->bautizo_id) }}" class="btn-edit">
                        <i class="lni lni-pencil"></i> Editar
                    </a>
                    <a href="{{ route('bautizo.pdf', $bautizo->bautizo_id) }}" target="_blank" class="print-button">
                        <i class="lni lni-printer"></i> Imprimir a PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection