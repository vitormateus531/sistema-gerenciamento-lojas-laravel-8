<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\ProdutoController;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'view'])->name('dashboard');
    Route::resource('funcionarios', FuncionariosController::class);
    Route::resource('lojas', LojaController::class);
    Route::resource('produtos', ProdutoController::class);

});
