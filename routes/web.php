<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BautizoController;
use App\Http\Controllers\ComunionController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
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

    // Rutas para comuniones
    Route::get('/dashboard-comunion-create', [ComunionController::class, 'create'])->name('comuniones.create');
    Route::post('/comuniones', [ComunionController::class, 'store'])->name('comuniones.store');
    Route::get('/dashboard-list-comunion', [ComunionController::class, 'index'])->name('comuniones.index');
    Route::get('/municipios/{departamento_id}', [ComunionController::class, 'getMunicipios']);

    // Otras rutas
    Route::get('/dashboard-list-confirmacion', function () {
        return view('list-confirmacion');
    });

    Route::get('/dashboard-confirmacion-create', function () {
        return view('confirmacion-craete-update');
    });

    Route::get('/dashboard-list-casamiento', function () {
        return view('list-casamiento');
    });

    Route::get('/dashboard-casamiento-create', function () {
        return view('casamiento-craete-update');
    });

    Route::get('/user-profile', function () {
        return view('user-profile');
    });
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
