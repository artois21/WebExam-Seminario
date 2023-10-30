<?php

use App\Http\Controllers\Api\PrestamosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//ruta con funcion especifica
Route::get('prestamo/{prestamo}/prestamoforuser', [PrestamosController::class, 'prestamoforuser']);

//Ruta para generar las rutas basicas de el controlador de category
Route::resource('prestamo',PrestamosController::class)->except(["create","edit"]);
