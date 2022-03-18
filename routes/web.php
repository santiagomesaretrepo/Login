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
    return view('welcome');
});
//controlador para para la vista del login
Route::get('viewloginuser',[App\Http\Controllers\Usercontroller::class,'indexViewuser'])->name('viewloginuser');
//controlador para la vista de nuevo usuario
Route::get('viewnewuser',[App\Http\Controllers\Usercontroller::class,'indexViewNewuser'])->name('viewnewuser');
//controlador para la vista editar usuario
Route::get('viewediteuser',[App\Http\Controllers\Usercontroller::class,'indexViewEditeuser'])->name('viewediteuser');
//controlador despues de loguerse
Route::get('viewlogueo',[App\Http\Controllers\Usercontroller::class,'indexViewUserlogueo'])->name('viewlogueo');
//controlador para crear un nuevo usuario
Route::get('newuser',[App\Http\Controllers\Usercontroller::class,'store'])->name('newuser');
//controlador que nos ayuda a consumir el api para crear un nuevo usuario
//Route::get('creteuser',[App\Http\Controllers\Usercontroller::class,'creteuser'])->name('creteuser');
//ingresar ala vista del  login
Route::get('login',[App\Http\Controllers\Usercontroller::class,'store'])->name('login');
//ingresar al login y validar usuario y contraseña
Route::get('validelogin',[App\Http\Controllers\Usercontroller::class,'login'])->name('validelogin');
//editar login
Route::get('editlogin',[App\Http\Controllers\Usercontroller::class,'edite'])->name('editlogin');
//vista despues de loguearse
//Route::get('viewlogin',[App\Http\Controllers\Usercontroller::class,'login'])->name('viewlogin');
