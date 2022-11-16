<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

//Acceder al index de empleado que creamos

Route::get('/empleado', function () {
    return view('empleado.index');
});

//Acceder al metodo create del controlador empleado
Route::get('/empleado/create', [EmpleadoController::class,'create']);

//CONSULTAR RUTAS ACTIVAS (php artisan route:list) desde la consola

Route::resource('empleado', EmpleadoController::class);
//Con esta Accedemos a todas las clases o url y trabajar con todos los metodos de Empelado Controller