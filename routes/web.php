<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BautizoController;
use App\Http\Controllers\ComunionController;
use App\Http\Controllers\ConfirmacionController;
use App\Http\Controllers\CasamientoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Ruta para mostrar el formulario de login
Route::get('/', function () {
    if (Auth::check()) {
        // Redirige al dashboard si el usuario ya está autenticado
        return redirect()->route('dashboard');
    }
    return view('login-app');
})->name('login');

// Ruta para procesar el login (POST)
Route::post('login', [LoginController::class, 'login'])->name('login.post');

// Ruta para cerrar sesión (POST)
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rutas protegidas para el dashboard y demás funcionalidades
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rutas para bautizos
    Route::get('/dashboard-bautizo-create', [BautizoController::class, 'create'])->name('bautizos.create');
    Route::post('/bautizos', [BautizoController::class, 'store'])->name('bautizos.store');
    Route::get('/municipios/{departamento_id}', [BautizoController::class, 'getMunicipios']);
    Route::get('/dashboard-list-bautizo', [BautizoController::class, 'index'])->name('bautizos.index');
    // Ruta para mostrar el detalle de un bautizo
    Route::get('/bautizos/{bautizo_id}', [BautizoController::class, 'show'])->name('bautizos.show');


    // Rutas para comuniones
    Route::get('/dashboard-comunion-create', [ComunionController::class, 'create'])->name('comuniones.create');
    Route::post('/comuniones', [ComunionController::class, 'store'])->name('comuniones.store');
    Route::get('/dashboard-list-comunion', [ComunionController::class, 'index'])->name('comuniones.index');
    Route::get('/municipios/{departamento_id}', [ComunionController::class, 'getMunicipios']);

    // Rutas para confirmaciones
    Route::get('/dashboard-confirmacion-create', [ConfirmacionController::class, 'create'])->name('confirmaciones.create');
    Route::post('/confirmaciones', [ConfirmacionController::class, 'store'])->name('confirmaciones.store');
    Route::get('/dashboard-list-confirmacion', [ConfirmacionController::class, 'index'])->name('confirmaciones.index');
    Route::get('/municipios/{departamento_id}', [ConfirmacionController::class, 'getMunicipios']);

    // Rutas para casamientos
    Route::get('/dashboard-casamiento-create', [CasamientoController::class, 'create'])->name('casamientos.create');
    Route::post('/casamientos', [CasamientoController::class, 'store'])->name('casamientos.store');
    Route::get('/dashboard-list-casamiento', [CasamientoController::class, 'index'])->name('casamientos.index');

    // Rutas para el perfil de usuario
    Route::get('/user-profile', [UserProfileController::class, 'show'])->name('user.profile');
    Route::put('/user-profile', [UserProfileController::class, 'update'])->name('user.update');
});

// Rutas para errores y autenticación adicional
Route::get('/auth-basic-forgot-password', function () {
    return view('auth-basic-forgot-password');
});

Route::get('/errors-404-error', function () {
    return view('errors-404-error');
});

Route::get('/errors-500-error', function () {
    return view('errors-500-error');
});
