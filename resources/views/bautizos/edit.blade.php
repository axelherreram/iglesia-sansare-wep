@extends('layouts.app')

@section('style')
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <style>
        /* Estilos generales */
        .page-content {
            background-color: #f8f9fa;
            padding: 1.5rem;
        }
        
        /* Estilos del formulario */
        .form-section {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }
        
        .form-section:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        /* Encabezado del formulario */
        .form-header {
            background: linear-gradient(135deg, #4a6cf7 0%, #2b3cf7 100%);
            color: white;
            padding: 25px 30px;
            position: relative;
        }
        
        .form-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 15px;
            margin-bottom: 5px;
            color: white;
        }
        
        .form-header p {
            opacity: 0.8;
            margin-bottom: 0;
        }
        
        /* Cuerpo del formulario */
        .form-body {
            padding: 30px;
        }
        
        /* Títulos de sección */
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #4a6cf7;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title i {
            font-size: 1.2rem;
        }
        
        /* Tarjetas de sección */
        .section-card {
            background-color: #f9fafc;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid #4a6cf7;
            transition: all 0.3s ease;
        }
        
        .section-card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }
        
        /* Botón de regresar */
        .back-button {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }
        
        .back-button i {
            font-size: 1.1rem;
        }
        
        /* Botón de guardar */
        .submit-button {
            background: linear-gradient(135deg, #4a6cf7 0%, #2b3cf7 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .submit-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(43, 60, 247, 0.25);
        }
        
        .submit-button:active {
            transform: translateY(-1px);
        }
        
        /* Estilos para los campos de formulario */
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        
        .form-control {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: #f9f9f9;
        }
        
        .form-control:focus {
            border-color: #4a6cf7;
            box-shadow: 0 0 0 3px rgba(74, 108, 247, 0.15);
            background-color: #fff;
        }
        
        .form-control::placeholder {
            color: #aaa;
        }
        
        /* Estilos para los selectores */
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23555' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            padding-right: 40px;
        }
        
        /* Estilos para los mensajes de error */
        .text-danger {
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }
        
        /* Estilos para los campos de búsqueda de personas */
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
        
        /* Estilos para los iconos en los campos */
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
        
        /* Estilos para los campos requeridos */
        .required-field::after {
            content: '*';
            color: #e74c3c;
            margin-left: 4px;
        }
        
        /* Estilos responsivos */
        @media (max-width: 768px) {
            .form-body {
                padding: 20px;
            }
            
            .section-card {
                padding: 15px;
            }
            
            .submit-button {
                width: 100%;
            }
        }
    </style>
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="form-section">
                <div class="form-header">
                    <a href="{{ route('bautizos.index') }}" class="back-button">
                        <i class="lni lni-arrow-left"></i> Regresar
                    </a>
                    <h3>Editar Bautizo</h3>
                    <p>Complete el formulario para actualizar el bautizo</p>
                </div>

                <div class="form-body">
                    <form id="update-persona-form" action="{{ route('bautizos.update', $bautizo->bautizo_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-book"></i> Información del Registro
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="NoPartida" class="form-label required-field">Partida No:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-ticket"></i>
                                        <input type="text" class="form-control" id="NoPartida" name="NoPartida"
                                            value="{{ old('NoPartida', $bautizo->NoPartida) }}" placeholder="Ej: 123-A">
                                    </div>
                                    @error('NoPartida')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="folio" class="form-label required-field">Folio:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-page"></i>
                                        <input type="text" class="form-control" id="folio" name="folio" 
                                            value="{{ old('folio', $bautizo->folio) }}" placeholder="Ej: 45">
                                    </div>
                                    @error('folio')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="fecha_bautizo" class="form-label required-field">Fecha de bautizo:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-calendar"></i>
                                        <input type="date" class="form-control" id="fecha_bautizo" name="fecha_bautizo"
                                        value="{{ old('fecha_bautizo', $bautizo->fecha_bautizo ? \Carbon\Carbon::parse($bautizo->fecha_bautizo)->format('Y-m-d') : '') }}">
                                    </div>
                                    @error('fecha_bautizo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-user"></i> Persona Bautizada
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="persona_bautizada_search" class="form-label required-field">Buscar Persona:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-search"></i>
                                            <input type="text" id="persona_bautizada_search" class="form-control"
                                                placeholder="Escribe el nombre, apellido o DPI (mínimo 3 caracteres)"
                                                value="{{ $bautizo->personaBautizada->nombres }} {{ $bautizo->personaBautizada->apellidos }} - {{ $bautizo->personaBautizada->dpi_cui }}">
                                        </div>
                                        <input type="hidden" id="persona_bautizada_id" name="persona_bautizada_id" value="{{ old('persona_bautizada_id', $bautizo->persona_bautizada_id) }}">
                                        <div class="search-results">
                                            <select id="select_persona_bautizada" class="form-control" style="display: none;" size="5">
                                                <!-- Opciones se llenarán con JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                    @error('persona_bautizada_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-map-marker"></i> Ubicación
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="aldea" class="form-label">Aldea:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-home"></i>
                                        <input type="text" class="form-control" id="aldea" name="aldea" 
                                            value="{{ old('aldea', $bautizo->aldea) }}" placeholder="Nombre de la aldea">
                                    </div>
                                    @error('aldea')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="departamento_id" class="form-label required-field">Departamento:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-map"></i>
                                        <select class="form-control" id="departamento_id" name="departamento_id">
                                            <option value="">Seleccione el departamento</option>
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->departamento_id }}" {{ old('departamento_id', $bautizo->departamento_id) == $departamento->departamento_id ? 'selected' : '' }}>
                                                    {{ $departamento->depto }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('departamento_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="municipio_id" class="form-label required-field">Municipio:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-pin"></i>
                                        <select class="form-control" id="municipio_id" name="municipio_id">
                                            <option value="">Seleccione el municipio</option>
                                            @foreach ($municipios as $municipio)
                                                <option value="{{ $municipio->municipio_id }}" {{ old('municipio_id', $bautizo->municipio_id) == $municipio->municipio_id ? 'selected' : '' }}>
                                                    {{ $municipio->municipio }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('municipio_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-users"></i> Datos de los Padres
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="padre_search" class="form-label">Padre:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-user"></i>
                                            <input type="text" id="padre_search" class="form-control"
                                                placeholder="Escribe el nombre, apellido o DPI"
                                                value="{{ $bautizo->padre ? $bautizo->padre->nombres . ' ' . $bautizo->padre->apellidos . ' - ' . $bautizo->padre->dpi_cui : '' }}">
                                        </div>
                                        <input type="hidden" id="padre_id" name="padre_id" value="{{ old('padre_id', $bautizo->padre_id) }}">
                                        <div class="search-results">
                                            <select id="select_padre" class="form-control" style="display: none;" size="5">
                                                <!-- Opciones se llenarán con JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                    @error('padre_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="madre_search" class="form-label">Madre:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-user"></i>
                                            <input type="text" id="madre_search" class="form-control"
                                                placeholder="Escribe el nombre, apellido o DPI"
                                                value="{{ $bautizo->madre ? $bautizo->madre->nombres . ' ' . $bautizo->madre->apellidos . ' - ' . $bautizo->madre->dpi_cui : '' }}">
                                        </div>
                                        <input type="hidden" id="madre_id" name="madre_id" value="{{ old('madre_id', $bautizo->madre_id) }}">
                                        <div class="search-results">
                                            <select id="select_madre" class="form-control" style="display: none;" size="5">
                                                <!-- Opciones se llenarán con JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                    @error('madre_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-crown"></i> Sacerdote
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="sacerdote_search" class="form-label">Sacerdote:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-user"></i>
                                            <input type="text" id="sacerdote_search" class="form-control"
                                                placeholder="Escribe el nombre, apellido o DPI"
                                                value="{{ $bautizo->sacerdote ? $bautizo->sacerdote->nombres . ' ' . $bautizo->sacerdote->apellidos . ' - ' . $bautizo->sacerdote->dpi_cui : '' }}">
                                        </div>
                                        <input type="hidden" id="sacerdote_id" name="sacerdote_id" value="{{ old('sacerdote_id', $bautizo->sacerdote_id) }}">
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

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-handshake"></i> Datos de los Padrinos
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="padrino_search" class="form-label">Padrino:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-user"></i>
                                            <input type="text" id="padrino_search" class="form-control"
                                                placeholder="Escribe el nombre, apellido o DPI"
                                                value="{{ $bautizo->padrino ? $bautizo->padrino->nombres . ' ' . $bautizo->padrino->apellidos . ' - ' . $bautizo->padrino->dpi_cui : '' }}">
                                        </div>
                                        <input type="hidden" id="padrino_id" name="padrino_id" value="{{ old('padrino_id', $bautizo->padrino_id) }}">
                                        <div class="search-results">
                                            <select id="select_padrino" class="form-control" style="display: none;" size="5">
                                                <!-- Opciones se llenarán con JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                    @error('padrino_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="madrina_search" class="form-label">Madrina:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-user"></i>
                                            <input type="text" id="madrina_search" class="form-control"
                                                placeholder="Escribe el nombre, apellido o DPI"
                                                value="{{ $bautizo->madrina ? $bautizo->madrina->nombres . ' ' . $bautizo->madrina->apellidos . ' - ' . $bautizo->madrina->dpi_cui : '' }}">
                                        </div>
                                        <input type="hidden" id="madrina_id" name="madrina_id" value="{{ old('madrina_id', $bautizo->madrina_id) }}">
                                        <div class="search-results">
                                            <select id="select_madrina" class="form-control" style="display: none;" size="5">
                                                <!-- Opciones se llenarán con JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                    @error('madrina_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-text-format"></i> Información Adicional
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="margen" class="form-label">Margen:</label>
                                    <textarea class="form-control" id="margen" name="margen" rows="3" 
                                        placeholder="Información adicional o notas al margen">{{ old('margen', $bautizo->margen) }}</textarea>
                                    @error('margen')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <div class="text-muted">
                                <small>Los campos marcados con <span class="text-danger">*</span> son obligatorios</small>
                            </div>
                            <button type="button" id="submit-btn" class="submit-button">
                                <i class="lni lni-save"></i> Actualizar Bautizo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            // Función para confirmar la actualización
            document.addEventListener('DOMContentLoaded', function() {
            // Aseguramos que el DOM esté completamente cargado
            const submitBtn = document.getElementById('submit-btn');
            const form = document.getElementById('update-persona-form');
            
            if (submitBtn && form) {
                console.log('Elementos encontrados correctamente');
                
                submitBtn.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevenir cualquier comportamiento predeterminado
                    console.log('Formulario validado y listo para enviar');
                    Swal.fire({
                        title: '¿Estás seguro de que deseas actualizar este registro?',
                        text: "Esta acción no se puede deshacer.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, actualizar',
                        cancelButtonText: 'No, cancelar',
                        reverseButtons: true
                    }).then((result) => {
                        console.log('Resultado de SweetAlert:', result);
                        
                        if (result.isConfirmed) {
                            console.log('Confirmado, enviando formulario...');
                            form.submit(); // Enviar el formulario si se confirma
                        } else {
                            console.log('Cancelado');
                        }
                    });
                });
            } else {
                console.error('No se encontraron los elementos necesarios');
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            const departamentoSelect = document.getElementById('departamento_id');
            const municipioSelect = document.getElementById('municipio_id');

            // Si ya hay un departamento seleccionado, cargar sus municipios
            if (departamentoSelect.value) {
                cargarMunicipios(departamentoSelect.value);
            }

            // Evento cuando se cambia el departamento
            departamentoSelect.addEventListener('change', function () {
                cargarMunicipios(this.value);
            });

            // Función para cargar municipios
            function cargarMunicipios(departamentoId) {
                // Mostrar indicador de carga
                municipioSelect.innerHTML = '<option value="">Cargando municipios...</option>';
                municipioSelect.disabled = true;
                
                if (departamentoId) {
                    fetch(`/municipios/${departamentoId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error en la respuesta del servidor');
                            }
                            return response.json();
                        })
                        .then(data => {
                            municipioSelect.innerHTML = '<option value="">Seleccione el municipio</option>';
                            municipioSelect.disabled = false;
                            
                            if (data && data.length > 0) {
                                data.forEach(municipio => {
                                    const option = document.createElement('option');
                                    option.value = municipio.municipio_id;
                                    option.textContent = municipio.municipio;
                                    option.selected = municipio.municipio_id == "{{ old('municipio_id', $bautizo->municipio_id) }}";
                                    municipioSelect.appendChild(option);
                                });
                            } else {
                                municipioSelect.innerHTML = '<option value="">No hay municipios disponibles</option>';
                            }
                        })
                        .catch(error => {
                            console.error('Error al obtener los municipios:', error);
                            municipioSelect.innerHTML = '<option value="">Error al cargar municipios</option>';
                            municipioSelect.disabled = false;
                        });
                } else {
                    municipioSelect.innerHTML = '<option value="">Seleccione el municipio</option>';
                    municipioSelect.disabled = false;
                }
            }

            // Configurar búsqueda para cada campo de persona
            setupPersonSearch('persona_bautizada_search', 'persona_bautizada_id', 'select_persona_bautizada', 'F'); // Feligrés por defecto
            setupPersonSearch('padre_search', 'padre_id', 'select_padre', 'F'); // Feligrés por defecto
            setupPersonSearch('madre_search', 'madre_id', 'select_madre', 'F'); // Feligrés por defecto
            setupPersonSearch('sacerdote_search', 'sacerdote_id', 'select_sacerdote', 'S'); // Sacerdote
            setupPersonSearch('padrino_search', 'padrino_id', 'select_padrino', 'F'); // Feligrés por defecto
            setupPersonSearch('madrina_search', 'madrina_id', 'select_madrina', 'F'); // Feligrés por defecto

            // Función para configurar la búsqueda de personas
            function setupPersonSearch(searchInputId, hiddenInputId, selectId, tipo = null) {
                const searchInput = document.getElementById(searchInputId);
                const hiddenInput = document.getElementById(hiddenInputId);
                const selectElement = document.getElementById(selectId);

                if (!searchInput || !hiddenInput || !selectElement) {
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
                    if (this.selectedIndex >= 0) {
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
@endsection