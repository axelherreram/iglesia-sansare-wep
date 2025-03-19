@extends('layouts.app')

@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <style>
        /* Estilos generales */
        .form-container {
            max-width: 900px;
            margin: auto;
        }
        
        .persona-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .persona-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }
        
        /* Estilos del encabezado */
        .card-header {
            background: linear-gradient(135deg, #4a6cf7 0%, #2b3cf7 100%);
            color: white;
            padding: 20px 25px;
            position: relative;
        }
        
        .back-button {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            font-weight: 500;
            text-decoration: none;
        }
        
        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            text-decoration: none;
            color: white;
        }
        
        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 15px;
            margin-bottom: 0;
            color: white;
        }
        
        /* Estilos del formulario */
        .form-section {
            padding: 30px;
        }
        
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #4a6cf7;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background-color: #f9f9f9;
        }
        
        .form-control:focus {
            border-color: #4a6cf7;
            box-shadow: 0 0 0 3px rgba(74, 108, 247, 0.2);
            background-color: #fff;
            outline: none;
        }
        
        .form-control::placeholder {
            color: #aaa;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .text-danger {
            color: #e74c3c !important;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }
        
        /* Estilos para los selectores */
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23555' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            padding-right: 40px;
        }
        
        /* Estilos para el botón de guardar */
        .submit-button {
            background: linear-gradient(135deg, #4a6cf7 0%, #2b3cf7 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-width: 180px;
        }
        
        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(43, 60, 247, 0.3);
        }
        
        .submit-button:active {
            transform: translateY(0);
        }
        
        /* Estilos para los iconos */
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
        
        /* Estilos para las tarjetas de sección */
        .section-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid #4a6cf7;
        }
        
        /* Estilos responsivos */
        @media (max-width: 768px) {
            .form-section {
                padding: 20px;
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
            <div class="form-container">
                <div class="persona-card">
                    <div class="card-header p-4">
                        <a href="{{ route('dashboard') }}" class="back-button">
                            <i class="lni lni-arrow-left"></i> Regresar
                        </a>
                        <h3 class="page-title">Crear Nueva Persona</h3>
                    </div>
                    
                    <form action="{{ route('personas.store') }}" method="POST" class="form-section">
                        @csrf
                        
                        <div class="section-card">
                            <h4 class="section-title">Información Personal</h4>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombres" class="form-label">Nombres</label>
                                        <div class="input-icon">
                                            <i class="lni lni-user"></i>
                                            <input type="text" class="form-control" id="nombres" name="nombres"
                                                placeholder="Ingrese nombres" value="{{ old('nombres') }}">
                                        </div>
                                        @error('nombres')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                        <div class="input-icon">
                                            <i class="lni lni-user"></i>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos"
                                                placeholder="Ingrese apellidos" value="{{ old('apellidos') }}">
                                        </div>
                                        @error('apellidos')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dpi_cui" class="form-label">DPI/CUI</label>
                                        <div class="input-icon">
                                            <i class="lni lni-id-card"></i>
                                            <input type="text" class="form-control" id="dpi_cui" name="dpi_cui"
                                                placeholder="Ingrese DPI/CUI" value="{{ old('dpi_cui') }}">
                                        </div>
                                        @error('dpi_cui')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                        <div class="input-icon">
                                            <i class="lni lni-calendar"></i>
                                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                                value="{{ old('fecha_nacimiento') }}">
                                        </div>
                                        @error('fecha_nacimiento')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="section-card">
                            <h4 class="section-title">Ubicación</h4>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="departamento_id" class="form-label">Departamento</label>
                                        <select class="form-control" id="departamento_id" name="departamento_id">
                                            <option value="">Seleccione un departamento</option>
                                            @foreach($departamentos as $departamento)
                                                <option value="{{ $departamento->departamento_id }}" {{ old('departamento_id') == $departamento->departamento_id ? 'selected' : '' }}>
                                                    {{ $departamento->depto }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('departamento_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="municipio_id" class="form-label">Municipio</label>
                                        <select class="form-control" id="municipio_id" name="municipio_id">
                                            <option value="">Seleccione un municipio</option>
                                            @foreach($municipios as $municipio)
                                                <option value="{{ $municipio->municipio_id }}" {{ old('municipio_id') == $municipio->municipio_id ? 'selected' : '' }}>
                                                    {{ $municipio->municipio }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('municipio_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="direccion" class="form-label">Dirección</label>
                                <div class="input-icon">
                                    <i class="lni lni-map-marker"></i>
                                    <input type="text" class="form-control" id="direccion" name="direccion"
                                        placeholder="Ingrese dirección completa" value="{{ old('direccion') }}">
                                </div>
                                @error('direccion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="section-card">
                            <h4 class="section-title">Información Adicional</h4>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sexo" class="form-label">Sexo</label>
                                        <select class="form-control" id="sexo" name="sexo">
                                            <option value="">Seleccione el sexo</option>
                                            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                                            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                                            <option value="O" {{ old('sexo') == 'O' ? 'selected' : '' }}>Otro</option>
                                        </select>
                                        @error('sexo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="num_telefono" class="form-label">Teléfono</label>
                                        <div class="input-icon">
                                            <i class="lni lni-phone"></i>
                                            <input type="text" class="form-control" id="num_telefono" name="num_telefono"
                                                placeholder="Ingrese número de teléfono" value="{{ old('num_telefono') }}">
                                        </div>
                                        @error('telefono')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="tipo_persona" class="form-label">Tipo de Persona</label>
                                <select class="form-control" id="tipo_persona" name="tipo_persona">
                                    <option value="">Seleccione el tipo de persona</option>
                                    <option value="F" {{ old('tipo_persona') == 'F' ? 'selected' : '' }}>Feligrés</option>
                                    <option value="S" {{ old('tipo_persona') == 'S' ? 'selected' : '' }}>Sacerdote</option>
                                    <option value="O" {{ old('tipo_persona') == 'O' ? 'selected' : '' }}>Obispo</option>
                                </select>
                                @error('tipo_persona')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="submit-button">
                                <i class="lni lni-save"></i> Guardar Persona
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
        document.getElementById('departamento_id').addEventListener('change', function () {
            let departamento_id = this.value;
            let municipioSelect = document.getElementById('municipio_id');

            municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>'; // Reset municipios

            if (departamento_id) {
                fetch(`/municipios/${departamento_id}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(municipio => {
                            let option = document.createElement('option');
                            option.value = municipio.municipio_id;
                            option.textContent = municipio.municipio;
                            option.selected = municipio.municipio_id == {{ old('municipio_id') ?? 'null' }};
                            municipioSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error al obtener municipios:', error));
            }
        });

        // Trigger change event if departamento_id has a value (for form validation errors)
        window.addEventListener('DOMContentLoaded', function() {
            const departamentoSelect = document.getElementById('departamento_id');
            if (departamentoSelect.value) {
                departamentoSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
@endsection

