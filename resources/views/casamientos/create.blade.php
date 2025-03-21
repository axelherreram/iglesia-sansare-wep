@extends('layouts.app')

@section('style')
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
            max-width: 900px;
            margin: auto;
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
                    <a href="{{ route('dashboard') }}" class="back-button">
                        <i class="lni lni-arrow-left"></i> Regresar
                    </a>
                    <h3>Crear Nuevo Casamiento</h3>
                    <p>Complete el formulario para registrar un nuevo casamiento</p>
                </div>

                <div class="form-body">
                    <form action="{{ route('casamientos.store') }}" method="POST">
                        @csrf

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
                                            value="{{ old('NoPartida') }}" placeholder="Ej: 123-A">
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
                                            value="{{ old('folio') }}" placeholder="Ej: 45">
                                    </div>
                                    @error('folio')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="fecha_casamiento" class="form-label required-field">Fecha de
                                        Casamiento:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-calendar"></i>
                                        <input type="date" class="form-control" id="fecha_casamiento"
                                            name="fecha_casamiento" value="{{ old('fecha_casamiento') }}">
                                    </div>
                                    @error('fecha_casamiento')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-user"></i> Datos del Esposo
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="esposo_search" class="form-label required-field">Buscar Esposo:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-search"></i>
                                            <input type="text" id="esposo_search" class="form-control"
                                                placeholder="Escribe el nombre, apellido o DPI (mínimo 3 caracteres)">
                                        </div>
                                        <input type="hidden" id="esposo_id" name="esposo_id" value="{{ old('esposo_id') }}">
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

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="origen_esposo" class="form-label">Origen:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-map-marker"></i>
                                        <input type="text" class="form-control" id="origen_esposo" name="origen_esposo"
                                            value="{{ old('origen_esposo') }}" placeholder="Lugar de origen">
                                    </div>
                                    @error('origen_esposo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="feligresesposo" class="form-label">Feligresía:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-church"></i>
                                        <input type="text" class="form-control" id="feligresesposo"
                                            name="feligresesposo" value="{{ old('feligresesposo') }}"
                                            placeholder="Feligresía">
                                    </div>
                                    @error('feligresesposo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-users"></i> Padres del Esposo
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="padre_esposo_search" class="form-label">Padre del Esposo:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-search"></i>
                                            <input type="text" id="padre_esposo_search" class="form-control"
                                                placeholder="Buscar padre del esposo">
                                        </div>
                                        <input type="hidden" id="padre_esposo_id" name="padre_esposo_id"
                                            value="{{ old('padre_esposo_id') }}">
                                        <div class="search-results">
                                            <select id="select_padre_esposo" class="form-control" style="display: none;"
                                                size="5">
                                                <!-- Opciones se llenarán con JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                    @error('padre_esposo_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="madre_esposo_search" class="form-label">Madre del Esposo:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-search"></i>
                                            <input type="text" id="madre_esposo_search" class="form-control"
                                                placeholder="Buscar madre del esposo">
                                        </div>
                                        <input type="hidden" id="madre_esposo_id" name="madre_esposo_id"
                                            value="{{ old('madre_esposo_id') }}">
                                        <div class="search-results">
                                            <select id="select_madre_esposo" class="form-control" style="display: none;"
                                                size="5">
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

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-user"></i> Datos de la Esposa
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="esposa_search" class="form-label required-field">Buscar Esposa:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-search"></i>
                                            <input type="text" id="esposa_search" class="form-control"
                                                placeholder="Escribe el nombre, apellido o DPI (mínimo 3 caracteres)">
                                        </div>
                                        <input type="hidden" id="esposa_id" name="esposa_id" value="{{ old('esposa_id') }}">
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

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="origen_esposa" class="form-label">Origen:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-map-marker"></i>
                                        <input type="text" class="form-control" id="origen_esposa" name="origen_esposa"
                                            value="{{ old('origen_esposa') }}" placeholder="Lugar de origen">
                                    </div>
                                    @error('origen_esposa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="feligresesposa" class="form-label">Feligresía:</label>
                                    <div class="input-icon">
                                        <i class="lni lni-church"></i>
                                        <input type="text" class="form-control" id="feligresesposa"
                                            name="feligresesposa" value="{{ old('feligresesposa') }}"
                                            placeholder="Feligresía">
                                    </div>
                                    @error('feligresesposa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-users"></i> Padres de la Esposa
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="padre_esposa_search" class="form-label">Padre de la Esposa:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-search"></i>
                                            <input type="text" id="padre_esposa_search" class="form-control"
                                                placeholder="Buscar padre de la esposa">
                                        </div>
                                        <input type="hidden" id="padre_esposa_id" name="padre_esposa_id"
                                            value="{{ old('padre_esposa_id') }}">
                                        <div class="search-results">
                                            <select id="select_padre_esposa" class="form-control" style="display: none;"
                                                size="5">
                                                <!-- Opciones se llenarán con JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                    @error('padre_esposa_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="madre_esposa_search" class="form-label">Madre de la Esposa:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-search"></i>
                                            <input type="text" id="madre_esposa_search" class="form-control"
                                                placeholder="Buscar madre de la esposa">
                                        </div>
                                        <input type="hidden" id="madre_esposa_id" name="madre_esposa_id"
                                            value="{{ old('madre_esposa_id') }}">
                                        <div class="search-results">
                                            <select id="select_madre_esposa" class="form-control" style="display: none;"
                                                size="5">
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

                        <div class="section-card">
                            <div class="section-title">
                                <i class="lni lni-crown"></i> Sacerdote
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="sacerdote_search" class="form-label">Sacerdote:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-search"></i>
                                            <input type="text" id="sacerdote_search" class="form-control"
                                                placeholder="Buscar sacerdote">
                                        </div>
                                        <input type="hidden" id="sacerdote_id" name="sacerdote_id"
                                            value="{{ old('sacerdote_id') }}">
                                        <div class="search-results">
                                            <select id="select_sacerdote" class="form-control" style="display: none;"
                                                size="5">
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
                                <i class="lni lni-users"></i> Testigos
                            </div>

                            <!-- Campo de búsqueda de testigos -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="testigo_search" class="form-label">Buscar Testigo:</label>
                                    <div class="search-container">
                                        <div class="input-icon">
                                            <i class="lni lni-search"></i>
                                            <input type="text" id="testigo_search" class="form-control"
                                                placeholder="Buscar testigo">
                                        </div>
                                        <div class="search-results">
                                            <select id="select_testigo" class="form-control" style="display: none;"
                                                size="5">
                                                <!-- Opciones se llenarán con JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contenedor para los testigos seleccionados -->
                            <div id="testigos-container">
                                <!-- Aquí se agregarán los testigos seleccionados -->
                            </div>

                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <div class="text-muted">
                                <small>Los campos marcados con <span class="text-danger">*</span> son obligatorios</small>
                            </div>
                            <button type="submit" class="submit-button">
                                <i class="lni lni-save"></i> Guardar Casamiento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const testigosContainer = document.getElementById("testigos-container");
            const testigoSearchInput = document.getElementById("testigo_search");
            const selectTestigo = document.getElementById("select_testigo");
            if (!testigoSearchInput || !selectTestigo) {
                console.error("Elementos no encontrados: testigo_search o select_testigo");
            } else {
                // Configurar búsqueda de testigos
                setupPersonSearch('testigo_search', null, 'select_testigo');
            }
            // Configurar búsqueda para cada campo de persona
            setupPersonSearch('esposo_search', 'esposo_id', 'select_esposo', 'F'); // Masculino
            setupPersonSearch('esposa_search', 'esposa_id', 'select_esposa', 'F'); // Femenino
            setupPersonSearch('padre_esposo_search', 'padre_esposo_id', 'select_padre_esposo', 'F'); // Masculino
            setupPersonSearch('madre_esposo_search', 'madre_esposo_id', 'select_madre_esposo', 'F'); // Femenino
            setupPersonSearch('padre_esposa_search', 'padre_esposa_id', 'select_padre_esposa', 'F'); // Masculino
            setupPersonSearch('madre_esposa_search', 'madre_esposa_id', 'select_madre_esposa', 'F'); // Femenino
            setupPersonSearch('sacerdote_search', 'sacerdote_id', 'select_sacerdote', 'S'); // Sacerdote


            // Cargar datos de personas seleccionadas previamente
            cargarPersonasSeleccionadas();

            // Función para agregar un testigo seleccionado
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


            // Función para cargar personas seleccionadas previamente (cuando hay errores de validación)
            function cargarPersonasSeleccionadas() {
                const personaIds = {
                    'esposo_id': 'esposo_search',
                    'esposa_id': 'esposa_search',
                    'padre_esposo_id': 'padre_esposo_search',
                    'madre_esposo_id': 'madre_esposo_search',
                    'padre_esposa_id': 'padre_esposa_search',
                    'madre_esposa_id': 'madre_esposa_search',
                    'sacerdote_id': 'sacerdote_search'
                };

                // Verificar cada campo de ID y cargar los datos si existe
                for (const [idField, searchField] of Object.entries(personaIds)) {
                    const hiddenInput = document.getElementById(idField);
                    const searchInput = document.getElementById(searchField);

                    if (hiddenInput && searchInput && hiddenInput.value) {
                        // Si hay un ID guardado, cargar los datos de la persona
                        fetch(`/api/personas/${hiddenInput.value}`)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Error al cargar datos de la persona');
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data) {
                                    // Mostrar el nombre completo en el campo de búsqueda
                                    searchInput.value = `${data.nombres} ${data.apellidos} - ${data.dpi_cui || 'Sin DPI'}`;
                                    searchInput.classList.add('is-valid');
                                }
                            })
                            .catch(error => {
                                console.error(`Error al cargar datos para ${idField}:`, error);
                            });
                    }
                }
            }

            // Función para configurar la búsqueda de personas
            function setupPersonSearch(searchInputId, hiddenInputId, selectId, tipo = null) {
                const searchInput = document.getElementById(searchInputId);
                const hiddenInput = hiddenInputId ? document.getElementById(hiddenInputId) : null; // Solo busca hiddenInput si se proporciona un ID
                const selectElement = document.getElementById(selectId);

                // Verificar solo los elementos que son obligatorios
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
                searchInput.addEventListener('input', function () {
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
                selectElement.addEventListener('change', function () {
                    if (this.selectedIndex >= 0) {
                        const selectedOption = this.options[this.selectedIndex];
                        const personaId = selectedOption.value;
                        const personaText = selectedOption.textContent;

                        // Si hay un campo oculto, establecer su valor
                        if (hiddenInput) {
                            hiddenInput.value = personaId;
                        }

                        // Establecer el valor en el campo de búsqueda
                        searchInput.value = personaText;

                        // Añadir una clase para indicar que se ha seleccionado
                        searchInput.classList.add('is-valid');

                        hideSelect();
                    }
                });

                // Evento para manejar clics fuera del selector
                document.addEventListener('click', function (event) {
                    if (event.target !== searchInput && event.target !== selectElement) {
                        hideSelect();
                    }
                });
            }

        });
    </script>
@endsection