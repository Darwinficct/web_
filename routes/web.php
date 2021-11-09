<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\JuzgadoController;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PruebaController;
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

Route::get('/',[ClienteController::class,'index'])->name('index');
Route::get('/expedientes/{prueba}',[ClienteController::class,'expedientes'])->name('expedientes');




Route::prefix('admin')->group(function () {
    Route::get('/login',[AdministradorController::class,'loginView'])->name('admin.login.view')->middleware('guest:admin');
    Route::post('/login',[AdministradorController::class,'login'])->name('admin.login')->middleware('guest:admin');

    Route::middleware(['auth:admin'])->group(function () {

        Route::post('/logout',[AdministradorController::class,'logout'])->name('admin.logout');

        Route::get('/menu',[AdministradorController::class,'menu'])->name('admin.menu');

        Route::get('/usuarios',[UsuarioController::class,'index'])->name('admin.usuarios');
        Route::get('/usuario/create',[UsuarioController::class,'create'])->name('admin.usuario.create');
        Route::post('/usuario/store',[UsuarioController::class,'store'])->name('admin.usuario.store');
        Route::get('/usuario/edit/{usuario}',[UsuarioController::class,'edit'])->name('admin.usuario.edit');
        Route::post('/usuario/update/{usuario}',[UsuarioController::class,'update'])->name('admin.usuario.update');
        Route::post('/usuario/delete/{usuario}',[UsuarioController::class,'destroy'])->name('admin.usuario.delete');

        Route::get('/ciudades',[CiudadController::class,'index'])->name('admin.ciudades');
        Route::get('/ciudad/create',[CiudadController::class,'create'])->name('admin.ciudad.create');
        Route::post('/ciudad/store',[CiudadController::class,'store'])->name('admin.ciudad.store');
        Route::get('/ciudad/edit/{ciudad}',[CiudadController::class,'edit'])->name('admin.ciudad.edit');
        Route::post('/ciudad/update/{ciudad}',[CiudadController::class,'update'])->name('admin.ciudad.update');
        Route::post('/ciudad/delete/{ciudad}',[CiudadController::class,'destroy'])->name('admin.ciudad.delete');

        Route::get('/juzgados',[JuzgadoController::class,'index'])->name('admin.juzgados');
        Route::get('/juzgado/create',[JuzgadoController::class,'create'])->name('admin.juzgado.create');
        Route::post('/juzgado/store',[JuzgadoController::class,'store'])->name('admin.juzgado.store');
        Route::get('/juzgado/edit/{juzgado}',[JuzgadoController::class,'edit'])->name('admin.juzgado.edit');
        Route::post('/juzgado/update/{juzgado}',[JuzgadoController::class,'update'])->name('admin.juzgado.update');
        Route::post('/juzgado/delete/{juzgado}',[JuzgadoController::class,'destroy'])->name('admin.juzgado.delete');

        Route::get('/casos',[CasoController::class,'index'])->name('admin.casos');
        Route::get('/caso/create',[CasoController::class,'create'])->name('admin.caso.create');
        Route::post('/caso/store',[CasoController::class,'store'])->name('admin.caso.store');
        Route::get('/caso/edit/{caso}',[CasoController::class,'edit'])->name('admin.caso.edit');
        Route::post('/caso/update/{caso}',[CasoController::class,'update'])->name('admin.caso.update');
        Route::post('/caso/delete/{caso}',[CasoController::class,'destroy'])->name('admin.caso.delete');


    });
    
});



Route::prefix('usuario')->group(function () {
    Route::get('/login',[UsuarioController::class,'loginView'])->name('usuario.login.view')->middleware('guest:usuario');
    Route::post('/login',[UsuarioController::class,'login'])->name('usuario.login')->middleware('guest:usuario');

    Route::middleware(['auth:usuario'])->group(function () {

        Route::post('/logout',[UsuarioController::class,'logout'])->name('usuario.logout');

        Route::get('/menu',[UsuarioController::class,'menu'])->name('usuario.menu');

        Route::get('/pruebas',[PruebaController::class,'index'])->name('usuario.pruebas');
        Route::get('/prueba/create',[PruebaController::class,'create'])->name('usuario.prueba.create');
        Route::post('/prueba/store',[PruebaController::class,'store'])->name('usuario.prueba.store');
        Route::get('/prueba/edit/{prueba}',[PruebaController::class,'edit'])->name('usuario.prueba.edit');
        Route::post('/prueba/update/{prueba}',[PruebaController::class,'update'])->name('usuario.prueba.update');
        Route::post('/prueba/delete/{prueba}',[PruebaController::class,'destroy'])->name('usuario.prueba.delete');

        Route::get('/expedientes',[ExpedienteController::class,'index'])->name('usuario.expedientes');
        Route::get('/expediente/create',[ExpedienteController::class,'create'])->name('usuario.expediente.create');
        Route::post('/expediente/store',[ExpedienteController::class,'store'])->name('usuario.expediente.store');
        Route::get('/expediente/edit/{expediente}',[ExpedienteController::class,'edit'])->name('usuario.expediente.edit');
        Route::post('/expediente/update/{expediente}',[ExpedienteController::class,'update'])->name('usuario.expediente.update');
        Route::post('/expediente/delete/{expediente}',[ExpedienteController::class,'destroy'])->name('usuario.expediente.delete');

    });
    
});