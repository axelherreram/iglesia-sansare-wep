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
            justify-content: center;
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
                        <a href="{{ route('comuniones.index') }}" class="back-button">
                            <i class="lni lni-arrow-left"></i> Regresar
                        </a>
                    </div>
                    <h2 class="persona-title mt-4" style="color: white">Registro de Primera Comunión</h2>
                    <p class="persona-subtitle">Partida: {{ $comunion->NoPartida }} • Folio: {{ $comunion->folio }}</p>
                </div>

                <div class="info-section">
                    <h3 class="section-title">Información de la Comunión</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Partida No:</span>
                            <div class="info-value">{{ $comunion->NoPartida }}</div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Folio:</span>
                            <div class="info-value">{{ $comunion->folio }}</div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Fecha de Comunión:</span>
                            <div class="info-value">
                                {{ $comunion->fecha_comunion ? \Carbon\Carbon::parse($comunion->fecha_comunion)->format('d/m/Y') : 'No especificado' }}
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <h3 class="section-title">Sacerdote</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Nombre del Sacerdote:</span>
                            <div class="info-value">{{ $comunion->sacerdote->nombres}} {{ $comunion->sacerdote->apellidos}} </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <h3 class="section-title">Persona que recibe la Comunión</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Nombre Completo:</span>
                            <div class="info-value">{{ $comunion->personaParticipe->nombres }}
                                {{ $comunion->personaParticipe->apellidos }}</div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Fecha de Nacimiento:</span>
                            <div class="info-value">
                                {{ $comunion->personaParticipe->fecha_nacimiento ? \Carbon\Carbon::parse($comunion->personaParticipe->fecha_nacimiento)->format('d/m/Y') : 'No especificado' }}
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <h3 class="section-title">Padres</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Padre:</span>
                            <div class="info-value">{{ $comunion->padre->nombres }} {{ $comunion->padre->apellidos }}</div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Madre:</span>
                            <div class="info-value">{{ $comunion->madre->nombres }} {{ $comunion->madre->apellidos }}</div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <h3 class="section-title">Ubicación</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Departamento:</span>
                            <div class="info-value">{{ $comunion->departamento->depto ?? 'No especificado' }}</div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Municipio:</span>
                            <div class="info-value">{{ $comunion->municipio->municipio ?? 'No especificado' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Botón de acción -->
                <div class="action-buttons">
                    <a href="{{ route('comuniones.pdf', $comunion->comunion_id) }}" target="_blank" class="print-button">
                        <i class="lni lni-printer"></i> Imprimir a PDF
                    </a>
                   
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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
@endsection