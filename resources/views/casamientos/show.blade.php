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
        justify-content: space-between;
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
    }

    .print-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(43, 60, 247, 0.3);
        color: white;
        text-decoration: none;
    }

    .edit-button {
        background-color: #fff8e6;
        color: #f7a74a;
        border: 1px solid #f7a74a;
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
    }

    .edit-button:hover {
        background-color: #ffefd6;
        transform: translateY(-2px);
        color: #e67e22;
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
            flex-direction: column;
            gap: 10px;
            padding: 0 15px 15px;
        }
        
        .print-button, .edit-button {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <div class="persona-card">
            <div class="card-header">
                <div class="header-content">
                    <a href="{{ route('casamientos.index') }}" class="back-button">
                        <i class="lni lni-arrow-left"></i> Regresar
                    </a>
                </div>
                <h2 class="persona-title mt-4">Registro de Casamiento</h2>
                <p class="persona-subtitle">Partida: {{ $casamiento->NoPartida }} • Folio: {{ $casamiento->folio }}</p>
            </div>

            <div class="info-section">
                <h3 class="section-title">Información del Casamiento</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Partida No:</span>
                        <div class="info-value">{{ $casamiento->NoPartida }}</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Folio:</span>
                        <div class="info-value">{{ $casamiento->folio }}</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Fecha de Casamiento:</span>
                        <div class="info-value">{{ $casamiento->fecha_casamiento ? \Carbon\Carbon::parse($casamiento->fecha_casamiento)->format('d/m/Y') : 'No especificado' }}</div>
                    </div>
                </div>

                <div class="section-divider"></div>
                
                <h3 class="section-title">Datos del Esposo</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Nombre:</span>
                        <div class="info-value">{{ $casamiento->nombre_esposo }}</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Edad:</span>
                        <div class="info-value">{{ $casamiento->edad_esposo }} años</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Origen:</span>
                        <div class="info-value">{{ $casamiento->origen_esposo ?: 'No especificado' }}</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Feligresía:</span>
                        <div class="info-value">{{ $casamiento->feligresia_esposo ?: 'No especificado' }}</div>
                    </div>
                </div>

                <div class="section-divider"></div>
                
                <h3 class="section-title">Padres del Esposo</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Padre:</span>
                        <div class="info-value">{{ $casamiento->nombre_padre_esposo ?: 'No especificado' }}</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Madre:</span>
                        <div class="info-value">{{ $casamiento->nombre_madre_esposo ?: 'No especificado' }}</div>
                    </div>
                </div>

                <div class="section-divider"></div>
                
                <h3 class="section-title">Datos de la Esposa</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Nombre:</span>
                        <div class="info-value">{{ $casamiento->nombre_esposa }}</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Edad:</span>
                        <div class="info-value">{{ $casamiento->edad_esposa }} años</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Origen:</span>
                        <div class="info-value">{{ $casamiento->origen_esposa ?: 'No especificado' }}</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Feligresía:</span>
                        <div class="info-value">{{ $casamiento->feligresia_esposa ?: 'No especificado' }}</div>
                    </div>
                </div>

                <div class="section-divider"></div>
                
                <h3 class="section-title">Padres de la Esposa</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Padre:</span>
                        <div class="info-value">{{ $casamiento->nombre_padre_esposa ?: 'No especificado' }}</div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Madre:</span>
                        <div class="info-value">{{ $casamiento->nombre_madre_esposa ?: 'No especificado' }}</div>
                    </div>
                </div>

                <div class="section-divider"></div>
                
                <h3 class="section-title">Testigos</h3>
                <div class="info-item" style="grid-column: span 2;">
                    <div class="info-value">{{ $casamiento->nombres_testigos ?: 'No especificado' }}</div>
                </div>

                <div class="section-divider"></div>
                
                <h3 class="section-title">Párroco</h3>
                <div class="info-item" style="grid-column: span 2;">
                    <div class="info-value">{{ $casamiento->nombre_parroco ?: 'No especificado' }}</div>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="action-buttons">
                <a href="{{ route('casamientos.edit', $casamiento->casamiento_id) }}" class="edit-button">
                    <i class="lni lni-pencil"></i> Editar
                </a>
                <a href="{{ route('casamientos.pdf', $casamiento->casamiento_id) }}" target="_blank" class="print-button">
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

