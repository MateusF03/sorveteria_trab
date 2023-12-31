<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SorveteController;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::redirect('/', '/sorvetes');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('sorvetes', SorveteController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::resource('clientes', ClienteController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::resource('fornecedores', FornecedorController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::resource('funcionarios', FuncionarioController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
});


require __DIR__ . '/auth.php';
