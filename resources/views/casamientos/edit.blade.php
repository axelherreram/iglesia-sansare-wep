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

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #555;
        font-size: 0.9rem;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background-color: #f9f9fa;
        width: 100%;
    }

    .form-control:focus {
        border-color: #4a6cf7;
        box-shadow: 0 0 0 3px rgba(74, 108, 247, 0.15);
        background-color: #fff;
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

    .action-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
        padding: 0 25px 25px;
    }

    .cancel-button {
        background-color: #f8f9fa;
        color: #555;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
    }

    .cancel-button:hover {
        background-color: #e9ecef;
        color: #333;
        text-decoration: none;
    }

    .save-button {
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

    .save-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(43, 60, 247, 0.3);
        color: white;
        text-decoration: none;
    }

    .search-container {
        position: relative;
        margin-bottom: 15px;
    }

    .search-results {
        position: absolute;
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
        background-color: white;
        border: 1px solid #e0e0e0;
        border-radius: 0 0 10px 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }

    .search-results select {
        width: 100%;
        border: none;
        border-radius: 0;
        box-shadow: none;
    }

    .search-results select option {
        padding: 12px 15px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .search-results select option:hover {
        background-color: #f5f7ff;
    }

    .input-icon {
        position: relative;
    }

    .input-icon i {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 15px;
        color: #aaa;
    }

    .input-icon .form-control {
        padding-left: 40px;
    }

    .required-field::after {
        content: '*';
        color: #e74c3c;
        margin-left: 4px;
    }

    .text-danger {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .info-section {
            padding: 15px;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 10px;
            padding: 0 15px 15px;
        }
        
        .cancel-button, .save-button {
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
                <h2 class="persona-title mt-4">Editar Registro de Casamiento</h2>
                <p class="persona-subtitle">Partida: {{ $casamiento->NoPartida }} • Folio: {{ $casamiento->folio }}</p>
            </div>

            <div class="info-section">
                <form id="edit-form" action="{{ route('casamientos.update', $casamiento->casamiento_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <h3 class="section-title">Información del Casamiento</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="NoPartida" class="form-label required-field">Partida No:</label>
                                <div class="input-icon">
                                    <i class="lni lni-ticket"></i>
                                    <input type="text" class="form-control" id="NoPartida" name="NoPartida" 
                                        value="{{ old('NoPartida', $casamiento->NoPartida) }}">
                                </div>
                                @error('NoPartida')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="folio" class="form-label required-field">Folio:</label>
                                <div class="input-icon">
                                    <i class="lni lni-page"></i>
                                    <input type="text" class="form-control" id="folio" name="folio" 
                                        value="{{ old('folio', $casamiento->folio) }}">
                                </div>
                                @error('folio')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha_casamiento" class="form-label required-field">Fecha de Casamiento:</label>
                                <div class="input-icon">
                                    <i class="lni lni-calendar"></i>
                                    <input type="date" class="form-control" id="fecha_casamiento" name="fecha_casamiento" 
                                        value="{{ old('fecha_casamiento', $casamiento->fecha_casamiento ? \Carbon\Carbon::parse($casamiento->fecha_casamiento)->format('Y-m-d') : '') }}">
                                </div>
                                @error('fecha_casamiento')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>
                    
                    <h3 class="section-title">Datos del Esposo</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="esposo_search" class="form-label required-field">Buscar Esposo:</label>
                                <div class="search-container">
                                    <div class="input-icon">
                                        <i class="lni lni-search"></i>
                                        <input type="text" id="esposo_search" class="form-control"
                                            placeholder="Escribe el nombre, apellido o DPI (mínimo 3 caracteres)"
                                            value="{{ $casamiento->esposo ? $casamiento->esposo->nombres . ' ' . $casamiento->esposo->apellidos . ' - ' . ($casamiento->esposo->dpi_cui ?: 'Sin DPI') : '' }}">
                                    </div>
                                    <input type="hidden" id="esposo_id" name="esposo_id" value="{{ old('esposo_id', $casamiento->esposo_id) }}">
                                    <div class="search-results">
                                        <select id="select_esposo" class="form-control" style="display: none;" size="5">
                                            <!-- Opciones se llenarán con JavaScript -->
                                        </select>
                                    </div>
                                </div>
                                @error('esposo_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="origen_esposo" class="form-label">Origen del Esposo:</label>
                                <div class="input-icon">
                                    <i class="lni lni-map-marker"></i>
                                    <input type="text" class="form-control" id="origen_esposo" name="origen_esposo" 
                                        value="{{ old('origen_esposo', $casamiento->origen_esposo) }}">
                                </div>
                                @error('origen_esposo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="feligresia_esposo" class="form-label">Feligresía del Esposo:</label>
                                <div class="input-icon">
                                    <i class="lni lni-church"></i>
                                    <input type="text" class="form-control" id="feligresia_esposo" name="feligresia_esposo" 
                                        value="{{ old('feligresia_esposo', $casamiento->feligresia_esposo) }}">
                                </div>
                                @error('feligresia_esposo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>
                    
                    <h3 class="section-title">Padres del Esposo</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="padre_esposo_search" class="form-label">Padre del Esposo:</label>
                                <div class="search-container">
                                    <div class="input-icon">
                                        <i class="lni lni-search"></i>
                                        <input type="text" id="padre_esposo_search" class="form-control"
                                            placeholder="Buscar padre del esposo"
                                            value="{{ $casamiento->padreEsposo ? $casamiento->padreEsposo->nombres . ' ' . $casamiento->padreEsposo->apellidos . ' - ' . ($casamiento->padreEsposo->dpi_cui ?: 'Sin DPI') : '' }}">
                                    </div>
                                    <input type="hidden" id="padre_esposo_id" name="padre_esposo_id" value="{{ old('padre_esposo_id', $casamiento->padre_esposo_id) }}">
                                    <div class="search-results">
                                        <select id="select_padre_esposo" class="form-control" style="display: none;" size="5">
                                            <!-- Opciones se llenarán con JavaScript -->
                                        </select>
                                    </div>
                                </div>
                                @error('padre_esposo_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="madre_esposo_search" class="form-label">Madre del Esposo:</label>
                                <div class="search-container">
                                    <div class="input-icon">
                                        <i class="lni lni-search"></i>
                                        <input type="text" id="madre_esposo_search" class="form-control"
                                            placeholder="Buscar madre del esposo"
                                            value="{{ $casamiento->madreEsposo ? $casamiento->madreEsposo->nombres . ' ' . $casamiento->madreEsposo->apellidos . ' - ' . ($casamiento->madreEsposo->dpi_cui ?: 'Sin DPI') : '' }}">
                                    </div>
                                    <input type="hidden" id="madre_esposo_id" name="madre_esposo_id" value="{{ old('madre_esposo_id', $casamiento->madre_esposo_id) }}">
                                    <div class="search-results">
                                        <select id="select_madre_esposo" class="form-control" style="display: none;" size="5">
                                            <!-- Opciones se llenarán con JavaScript -->
                                        </select>
                                    </div>
                                </div>
                                @error('madre_esposo_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>
                    
                    <h3 class="section-title">Datos de la Esposa</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="esposa_search" class="form-label required-field">Buscar Esposa:</label>
                                <div class="search-container">
                                    <div class="input-icon">
                                        <i class="lni lni-search"></i>
                                        <input type="text" id="esposa_search" class="form-control"
                                            placeholder="Escribe el nombre, apellido o DPI (mínimo 3 caracteres)"
                                            value="{{ $casamiento->esposa ? $casamiento->esposa->nombres . ' ' . $casamiento->esposa->apellidos . ' - ' . ($casamiento->esposa->dpi_cui ?: 'Sin DPI') : '' }}">
                                    </div>
                                    <input type="hidden" id="esposa_id" name="esposa_id" value="{{ old('esposa_id', $casamiento->esposa_id) }}">
                                    <div class="search-results">
                                        <select id="select_esposa" class="form-control" style="display: none;" size="5">
                                            <!-- Opciones se llenarán con JavaScript -->
                                        </select>
                                    </div>
                                </div>
                                @error('esposa_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="origen_esposa" class="form-label">Origen de la Esposa:</label>
                                <div class="input-icon">
                                    <i class="lni lni-map-marker"></i>
                                    <input type="text" class="form-control" id="origen_esposa" name="origen_esposa" 
                                        value="{{ old('origen_esposa', $casamiento->origen_esposa) }}">
                                </div>
                                @error('origen_esposa')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="feligresia_esposa" class="form-label">Feligresía de la Esposa:</label>
                                <div class="input-icon">
                                    <i class="lni lni-church"></i>
                                    <input type="text" class="form-control" id="feligresia_esposa" name="feligresia_esposa" 
                                        value="{{ old('feligresia_esposa', $casamiento->feligresia_esposa) }}">
                                </div>
                                @error('feligresia_esposa')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>
                    
                    <h3 class="section-title">Padres de la Esposa</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="padre_esposa_search" class="form-label">Padre de la Esposa:</label>
                                <div class="search-container">
                                    <div class="input-icon">
                                        <i class="lni lni-search"></i>
                                        <input type="text" id="padre_esposa_search" class="form-control"
                                            placeholder="Buscar padre de la esposa"
                                            value="{{ $casamiento->padreEsposa ? $casamiento->padreEsposa->nombres . ' ' . $casamiento->padreEsposa->apellidos . ' - ' . ($casamiento->padreEsposa->dpi_cui ?: 'Sin DPI') : '' }}">
                                    </div>
                                    <input type="hidden" id="padre_esposa_id" name="padre_esposa_id" value="{{ old('padre_esposa_id', $casamiento->padre_esposa_id) }}">
                                    <div class="search-results">
                                        <select id="select_padre_esposa" class="form-control" style="display: none;" size="5">
                                            <!-- Opciones se llenarán con JavaScript -->
                                        </select>
                                    </div>
                                </div>
                                @error('padre_esposa_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="madre_esposa_search" class="form-label">Madre de la Esposa:</label>
                                <div class="search-container">
                                    <div class="input-icon">
                                        <i class="lni lni-search"></i>
                                        <input type="text" id="madre_esposa_search" class="form-control"
                                            placeholder="Buscar madre de la esposa"
                                            value="{{ $casamiento->madreEsposa ? $casamiento->madreEsposa->nombres . ' ' . $casamiento->madreEsposa->apellidos . ' - ' . ($casamiento->madreEsposa->dpi_cui ?: 'Sin DPI') : '' }}">
                                    </div>
                                    <input type="hidden" id="madre_esposa_id" name="madre_esposa_id" value="{{ old('madre_esposa_id', $casamiento->madre_esposa_id) }}">
                                    <div class="search-results">
                                        <select id="select_madre_esposa" class="form-control" style="display: none;" size="5">
                                            <!-- Opciones se llenarán con JavaScript -->
                                        </select>
                                    </div>
                                </div>
                                @error('madre_esposa_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>
                    
                    <h3 class="section-title">Testigos</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="testigo_search" class="form-label">Buscar Testigo:</label>
                                <div class="search-container">
                                    <div class="input-icon">
                                        <i class="lni lni-search"></i>
                                        <input type="text" id="testigo_search" class="form-control"
                                            placeholder="Escribe el nombre, apellido o DPI (mínimo 3 caracteres)">
                                    </div>
                                    <div class="search-results">
                                        <select id="select_testigo" class="form-control" style="display: none;" size="5">
                                            <!-- Opciones se llenarán con JavaScript -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="testigos-container">
                        <!-- Aquí se agregarán los testigos seleccionados -->
                    </div>
                    <button type="button" id="add-testigo" class="btn btn-primary">Agregar Testigo Manualmente</button>

                    <div class="section-divider"></div>
                    
                    <h3 class="section-title">Párroco</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sacerdote_search" class="form-label">Sacerdote:</label>
                                <div class="search-container">
                                    <div class="input-icon">
                                        <i class="lni lni-crown"></i>
                                        <input type="text" id="sacerdote_search" class="form-control"
                                            placeholder="Buscar sacerdote"
                                            value="{{ $casamiento->sacerdote ? $casamiento->sacerdote->nombres . ' ' . $casamiento->sacerdote->apellidos . ' - ' . ($casamiento->sacerdote->dpi_cui ?: 'Sin DPI') : '' }}">
                                    </div>
                                    <input type="hidden" id="sacerdote_id" name="sacerdote_id" value="{{ old('sacerdote_id', $casamiento->sacerdote_id) }}">
                                    <div class="search-results">
                                        <select id="select_sacerdote" class="form-control" style="display: none;" size="5">
                                            <!-- Opciones se llenarán con JavaScript -->
                                        </select>
                                    </div>
                                </div>
                                @error('sacerdote_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="action-buttons">
                        <a href="{{ route('casamientos.show', $casamiento->casamiento_id) }}" class="cancel-button">
                            <i class="lni lni-close"></i> Cancelar
                        </a>
                        <button type="button" id="submit-btn" class="save-button">
                            <i class="lni lni-save"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Configuración del botón de envío con confirmación
        const submitBtn = document.getElementById('submit-btn');
        const form = document.getElementById('edit-form');
        
        submitBtn.addEventListener('click', function() {
            Swal.fire({
                title: '¿Está seguro de guardar los cambios?',
                text: "Esta acción actualizará el registro del casamiento",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4a6cf7',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, guardar cambios',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // Mostrar mensaje de éxito si existe
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        // Configurar búsqueda para cada campo de persona
        setupPersonSearch('esposo_search', 'esposo_id', 'select_esposo', 'F'); // Masculino
        setupPersonSearch('esposa_search', 'esposa_id', 'select_esposa', 'F'); // Femenino
        setupPersonSearch('padre_esposo_search', 'padre_esposo_id', 'select_padre_esposo', 'F'); // Masculino
        setupPersonSearch('madre_esposo_search', 'madre_esposo_id', 'select_madre_esposo', 'F'); // Femenino
        setupPersonSearch('padre_esposa_search', 'padre_esposa_id', 'select_padre_esposa', 'F'); // Masculino
        setupPersonSearch('madre_esposa_search', 'madre_esposa_id', 'select_madre_esposa', 'F'); // Femenino
        setupPersonSearch('sacerdote_search', 'sacerdote_id', 'select_sacerdote', 'S'); // Sacerdote
        setupPersonSearch('testigo_search', null, 'select_testigo'); // Testigos

        // Configuración para testigos
        const testigosContainer = document.getElementById("testigos-container");
        const testigoSearchInput = document.getElementById("testigo_search");
        const selectTestigo = document.getElementById("select_testigo");
        
        // Evento cuando se selecciona un testigo
        selectTestigo.addEventListener("change", function () {
            if (this.selectedIndex >= 0) {
                const selectedOption = this.options[this.selectedIndex];
                const personaId = selectedOption.value;
                const personaText = selectedOption.textContent;

                // Crear un nuevo elemento para el testigo seleccionado
                const newTestigo = document.createElement("div");
                newTestigo.classList.add("row", "mb-3", "testigo-item");
                newTestigo.innerHTML = `
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="testigos_seleccionados[]" value="${personaText}" readonly>
                        <input type="hidden" name="testigos[]" value="${personaId}">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-testigo">X</button>
                    </div>
                `;
                testigosContainer.appendChild(newTestigo);

                // Limpiar el campo de búsqueda y ocultar el selector
                testigoSearchInput.value = "";
                selectTestigo.style.display = "none";
            }
        });

        // Función para agregar testigos manualmente
        const addTestigoBtn = document.getElementById("add-testigo");
        addTestigoBtn.addEventListener("click", function () {
            const newTestigo = document.createElement("div");
            newTestigo.classList.add("row", "mb-3", "testigo-item");
            newTestigo.innerHTML = `
                <div class="col-md-10">
                    <input type="text" class="form-control" name="nombres_testigos[]" placeholder="Ingrese el nombre del testigo">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-testigo">X</button>
                </div>
            `;
            testigosContainer.appendChild(newTestigo);
        });

        // Función para eliminar testigos
        testigosContainer.addEventListener("click", function (e) {
            if (e.target.classList.contains("remove-testigo")) {
                e.target.closest(".testigo-item").remove();
            }
        });

        // Función para configurar la búsqueda de personas
        function setupPersonSearch(searchInputId, hiddenInputId, selectId, tipo = null) {
            const searchInput = document.getElementById(searchInputId);
            const hiddenInput = hiddenInputId ? document.getElementById(hiddenInputId) : null;
            const selectElement = document.getElementById(selectId);

            if (!searchInput || !selectElement) {
                console.error(`Elementos no encontrados para: ${searchInputId}`);
                return;
            }

            // Función para mostrar un mensaje de carga
            function showLoading() {
                selectElement.innerHTML = '<option>Buscando...</option>';
                selectElement.style.display = 'block';
            }

            // Función para ocultar el selector
            function hideSelect() {
                selectElement.style.display = 'none';
            }

            // Variable para controlar el tiempo de espera
            let typingTimer;
            const doneTypingInterval = 500; // Tiempo en ms

            // Evento cuando se escribe en el campo de búsqueda
            searchInput.addEventListener('input', function() {
                const searchValue = this.value;
                
                // Limpiar el temporizador anterior
                clearTimeout(typingTimer);
                
                if (searchValue.length > 2) {
                    // Mostrar indicador de carga
                    showLoading();
                    
                    // Configurar un nuevo temporizador
                    typingTimer = setTimeout(() => {
                        let url = `/api/personas/buscar?search=${searchValue}`;
                        
                        // Agregar el tipo de persona si está definido
                        if (tipo) {
                            url += `&tipo=${tipo}`;
                        }
                        
                        fetch(url)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Error en la respuesta del servidor');
                                }
                                return response.json();
                            })
                            .then(data => {
                                selectElement.innerHTML = ''; // Limpiar opciones previas
                                
                                if (data.data && data.data.length > 0) {
                                    data.data.forEach(person => {
                                        const option = document.createElement('option');
                                        option.value = person.persona_id;
                                        option.textContent = `${person.nombres} ${person.apellidos} - ${person.dpi_cui || 'Sin DPI'}`;
                                        selectElement.appendChild(option);
                                    });
                                    selectElement.style.display = 'block';
                                } else {
                                    selectElement.innerHTML = '<option>No se encontraron resultados</option>';
                                    setTimeout(hideSelect, 2000); // Ocultar después de 2 segundos
                                }
                            })
                            .catch(error => {
                                console.error('Error en la búsqueda:', error);
                                selectElement.innerHTML = '<option>Error en la búsqueda</option>';
                                setTimeout(hideSelect, 2000); // Ocultar después de 2 segundos
                            });
                    }, doneTypingInterval);
                } else {
                    hideSelect();
                }
            });

            // Evento cuando se selecciona una persona
            selectElement.addEventListener('change', function() {
                if (this.selectedIndex >= 0 && hiddenInput) {
                    const selectedOption = this.options[this.selectedIndex];
                    const personaId = selectedOption.value;
                    const personaText = selectedOption.textContent;
                    
                    hiddenInput.value = personaId;
                    searchInput.value = personaText;
                    
                    // Añadir una clase para indicar que se ha seleccionado
                    searchInput.classList.add('is-valid');
                    
                    hideSelect();
                }
            });

            // Evento para manejar clics fuera del selector
            document.addEventListener('click', function(event) {
                if (event.target !== searchInput && event.target !== selectElement) {
                    hideSelect();
                }
            });
        }
    });
</script>

