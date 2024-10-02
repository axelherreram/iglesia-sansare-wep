<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('login-app');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard-list-bautizo', function () {
    return view('list-bautizo');
});

Route::get('/dashboard-bautizo-create', function () {
    return view('bautizo-craete-update');
});

Route::get('/dashboard-list-comunion', function () {
    return view('list-comunion');
});

Route::get('/dashboard-comunion-create', function () {
    return view('comunion-craete-update');
});

Route::get('/dashboard-list-confirmacion', function () {
    return view('list-confirmacion');
});

Route::get('/dashboard-confirmacion-create', function () {
    return view('confirmacion-craete-update');
});


Route::get('/dashboard-list-casamiento', function () {
    return view('list-casamiento');
});

Route::get('//dashboard-casamiento-create', function () {
    return view('casamiento-craete-update');
});

Route::get('//crear-persona', function () {
    return view('crear-persona');
});



Route::get('/auth-basic-forgot-password', function () {
    return view('auth-basic-forgot-password');
});

Route::get('/user-profile', function () {
    return view('user-profile');
});
Route::get('/errors-404-error', function () {
    return view('errors-404-error');
});
Route::get('/errors-500-error', function () {
    return view('errors-500-error');
});
