<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedoresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// RUTAS PROVEEDORES Y CATEGORIAS (deben ir antes del wildcard "{page}")
Route::get('/proveedores/list', [ProveedoresController::class, 'list'])->name('proveedores.list');
Route::resource('proveedores', ProveedoresController::class);
Route::resource('categorias', CategoriaController::class);
Route::get('/api/categoria-info/{id}', [CategoriaController::class, 'getCategoriaInfo'])->name('api.categoria.info');

// RUTAS DE USUARIO Y PERFIL (si las usas; puedes ajustarlas según tu proyecto)
Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

// IMPORTANTE: Este grupo wildcard debe ir hasta el FINAL
Route::group(['middleware' => 'auth'], function () {
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});