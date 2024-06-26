<?php

use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RutasController;
use App\Exports\RutasExport;
use App\Http\Controllers\HomeController;
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

Route::get('/landing', [\App\Http\Controllers\PublicLandingController::class, 'landing'])->name('landing');
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');



Auth::routes();
Route::get('/', [HomeController::class, 'root'])->name('root');
Route::get('ajax_user', [UserController::class, 'userdata'])->name('config.ajaxindex');
Route::get('ajax_rutas', [RutasController::class, 'data'])->name('rutas.ajaxindex');
Route::get('routes-form' , [RutasController::class, 'form'])->name('test');
Route::post('routes-form', [RutasController::class, 'store'])->name('routes-form.store');
Route::get('rutas/export/', [RutasController::class, 'csv_export'])->name('rutas.export-csv');
Route::get('rutas/custom_export/', [RutasController::class, 'csvCustomExport'])->name('rutas.export-custom-csv');
Route::get('rutas/api/', [RutasController::class, 'to_api'])->name('rutas.call-api');
Route::get('rutas/trucks/', [RutasController::class, 'get_vehiculos'])->name('rutas.call-trucks');
Route::get('rutas/qr-print/{ruta}', [RutasController::class, 'qr'])->name('ruta.print-qr');
Route::get('rutas/qr-print-masivo/{rutas}', [RutasController::class, 'qrMassive'])->name('rutas.imprimir-masivo');
Route::get('/generar-numero-guia', [RutasController::class, 'generarNumeroGuia']);

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
// Rutas y controladores que solo los usuarios con el rol "admin" pueden acceder.
Route::resource('config',UserController::class );
#Ruta para eliminar usuarios
Route::delete('config/eliminar/{id}', [UserController::class, 'destroy'])->name('config.eliminar');
#Ruta para almacenar usuarios
Route::post('config/new_user', [UserController::class, 'store'])->name('config.guardar');
#Ruta para ver usuarios en modal para la funcion checkData
Route::get('config/ver/{id}', [UserController::class, 'checkData'])->name('config.ver');
//Update User Details
Route::post('/update-profile/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');
Route::middleware(['role:admin'])->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/list', [RoleController::class, 'list'])->name('roles.list');
    Route::resource('roles', RoleController::class);
    Route::delete('/roles/{role}', [RoleController::class,'destroy'])->name('roles.destroy');

    Route::get('permissions/{id}', [PermissionsController::class, 'index'])->name('permissions.index');
    Route::get('permissions/table/{id}', [PermissionsController::class,'table'])->name('permissions.table');
    Route::post('permissions/{id}/update', [PermissionsController::class,'update'])->name('permissions.update');



});




Route::resource('rutas',RutasController::class );

//Language Translation
Route::get('index/{locale}', [HomeController::class, 'lang']);




Route::get('{any}', [HomeController::class, 'index'])->name('index');

//Route::resource('rutas' , \App\Http\Controllers\RutasController::class);



