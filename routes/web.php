<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoControllerController;
use App\Http\Controllers\PuestoControllerController;
use App\Http\Controllers\EmpleadosControllerController;
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
    return view('base');
});
Route::resource('empleados', EmpleadosControllerController::class);
Route::get('jefes',[ EmpleadosControllerController::class, 'verJefes'])->name('empleados.verJefes');
Route::get('maximo',[ EmpleadosControllerController::class, 'verMaximo'])->name('empleados.verMaximo');
Route::get('cantidadEmpleados',[ DepartamentoControllerController::class, 'departamentoEmpleados'])->name('departamentos.departamentoEmpleados');
Route::resource('departamentos', DepartamentoControllerController::class);
Route::resource('puesto', PuestoControllerController::class);





