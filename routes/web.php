<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

Route::middleware('auth')->group(function () {
    
    
    
    Route::get('/profile/cadastrar', [ProfileController::class, 'cadastroIndex'])->name('profile.cadastro');
    Route::post('/profile/cadastrar/create', [ProfileController::class, 'cadastroCreate'])->name('profile.cadastro.create');



    Route::middleware('cadastrado')->group(function () {

        Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
        Route::get('/profile/editar', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::delete('/profile/deletar', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        
    });
});

require __DIR__.'/auth.php';
