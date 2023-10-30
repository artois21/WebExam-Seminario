<?php

use App\Http\Controllers\Crud\CategoryController;
use App\Http\Controllers\Crud\CrudController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\BlogController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']],function () {
    //ruta de tipo recurso para CRUD
    Route::resource('prestamo',PrestamoController::class);
    //solo las que pongamos Route::resource('post',CrudController::class)->only('show');
    //funcionen todad excepto una Route::resource('post',CrudController::class)->except('show');
});
require __DIR__.'/auth.php';
