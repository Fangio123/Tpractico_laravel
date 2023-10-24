<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function(){
    return view('welcome');

});


Route::get('/CerrarSesion',[App\Http\Controllers\HomeController::class,'logout'])->name('CerrarSesion');

Route::get('/vista_usuarios', [App\Http\Controllers\HomeController::class,'gestion_usurios'])->name('vistaUsuarios');

Route::post('/guardar_usuario',[App\Http\Controllers\HomeController::class, 'guardar_usuario'])->name('guardarusu');

Route::middleware([ 'auth' ])->group( function(){


Route::get('/alta_producto',[App\Http\Controllers\HomeController::class, 'alta_producto'])->name('alta');

Route::post('/guardar_producto',[App\Http\Controllers\HomeController::class, 'guardar_producto'])->name('guardar');

Route::get('/modificar_producto{id}',[App\Http\Controllers\HomeController::class, 'modificar_producto'])->name('modificar');

Route::delete('/borrar_producto{id}',[App\Http\Controllers\HomeController::class, 'borrar_producto'])->name('borrar');

Route::put('/actualizar_producto{id}',[App\Http\Controllers\HomeController::class, 'actualizar_producto'])->name('actualizar');
});

Auth::routes();


