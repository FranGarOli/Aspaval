<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EventUserController;

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

//Primera pagina - pagina principal
Route::get('/', function(){
    return view('inicio');
})->name('inicio');

//Rutas para el registro
Route::get('register', [LoginController::class, 'registerForm'])->name('registerForm');
Route::post('register', [LoginController::class, 'register'])->name('registro');

//Rutas para el login
Route::get('login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');

//Ruta de logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//Ruta de politicas y cookies
Route::get('politicas', [StaticPagesController::class, 'politicas'])->name('politicas');

//Ruta de miembros que se apuntan a eventos
Route::put('join/{event}', [EventController::class, 'join'])->name('join')->middleware('auth');
//Rutas de eventos - el middleware está en el constructor del controlador eventcontroller
Route::resource('events', EventController::class);

//Rutas de miembros
Route::resource('members', MemberController::class)
->only(['index', 'show']);

//Rutas de mensajes
Route::resource('messages', MessageController::class)->except(['edit', 'update']);

//Ruta de contacto
Route::get('contacto', [StaticPagesController::class, 'contacto'])->name('contacto');

//Ruta de localizacion
Route::get('localizacion', [StaticPagesController::class, 'localizacion'])->name('localizacion');

//Ruta de cuenta
Route::resource('account', AccountController::class)
->except([
    'store', 'create', 'destroy'
])->middleware('auth');




