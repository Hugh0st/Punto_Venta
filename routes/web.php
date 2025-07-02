<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedoresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas personalizadas ANTES de los resource
Route::get('/proveedores/list', [ProveedoresController::class, 'list'])->name('proveedores.list');
Route::get('/api/categoria-info/{id}', [CategoriaController::class, 'getCategoriaInfo'])->name('api.categoria.info');

// --- *** OJO: las rutas de recursos van FUERA del middleware de auth para que sean públicas *** ---
Route::resource('proveedores', ProveedoresController::class);
Route::resource('categorias', CategoriaController::class);

// Rutas protegidas por autenticación
Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    // Esta ruta debería ir al final, para no "capturar" otras rutas
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});