@extends('layouts.app')

@section('style')
<style>
   
</style>
@endsection

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="profile-card">
                            <div class="profile-header">
                                <div class="profile-avatar">
                                    <i class="lni lni-user"></i>
                                </div>
                                <h2 class="profile-title" style="color: white">Mi Perfil</h2>
                                <p class="profile-subtitle">Actualiza tu información personal</p>
                            </div>
                            
                            <div class="profile-body">
                                <!-- Formulario para actualizar el perfil -->
                                <form action="{{ route('user.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">
                                                    <i class="lni lni-user"></i> Nombres
                                                </label>
                                                <input type="text" class="form-control" name="nombres"
                                                    value="{{ old('nombres', $user->nombres) }}" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">
                                                    <i class="lni lni-user"></i> Apellidos
                                                </label>
                                                <input type="text" class="form-control" name="apellidos"
                                                    value="{{ old('apellidos', $user->apellidos) }}" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="lni lni-envelope"></i> Email
                                        </label>
                                        <input type="email" class="form-control" name="email" disabled
                                            value="{{ old('email', $user->email) }}" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="lni lni-lock-alt"></i> Nueva Contraseña
                                        </label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Dejar en blanco si no deseas cambiarla" />
                                        <div class="form-hint">La contraseña debe tener al menos 8 caracteres y contener letras y números</div>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group mb-0 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="lni lni-save"></i> Guardar Cambios
                                        </button>
                                    </div>
                                </form>

                                @if (session('success'))
                                    <div class="alert alert-success mt-4">
                                        <i class="lni lni-checkmark-circle"></i>
                                        <span>{{ session('success') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

