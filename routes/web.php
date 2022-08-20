<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListarController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ServicioController;

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

/*Route::get('/', function () {
    return view('index');
});*/

//Route::get('/',[ListarController::class,'index']);

Route::resource('proveedores', ProveedorController::class );

Route::resource('servicio', ServicioController::class );
