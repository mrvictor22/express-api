<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RutasController;
use App\Exports\RutasExport;
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

Auth::routes();
Route::get('ajax_user', [\App\Http\Controllers\UserController::class, 'userdata'])->name('config.ajaxindex');
Route::get('ajax_rutas', [\App\Http\Controllers\RutasController::class, 'data'])->name('rutas.ajaxindex');
Route::get('routes-form' , [\App\Http\Controllers\RutasController::class, 'form'])->name('test');
Route::post('routes-form', [\App\Http\Controllers\RutasController::class, 'store'])->name('routes-form.store');
Route::get('rutas/export/', [RutasController::class, 'csv_export'])->name('rutas.export-csv');
Route::get('rutas/api/', [RutasController::class, 'to_api'])->name('rutas.call-api');
Route::get('rutas/trucks/', [RutasController::class, 'get_vehiculos'])->name('rutas.call-trucks');
Route::get('rutas/qr-print/{ruta}', [RutasController::class, 'qr'])->name('ruta.print-qr');
Route::get('/generar-numero-guia', [RutasController::class, 'generarNumeroGuia']);


Route::resource('config',UserController::class );
Route::resource('rutas',RutasController::class );

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Route::resource('rutas' , \App\Http\Controllers\RutasController::class);
