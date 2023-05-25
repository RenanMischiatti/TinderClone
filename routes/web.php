<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ChatController;
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
    
    
    
    Route::get('/profile/cadastrar', [CadastroController::class, 'cadastroIndex'])->name('profile.cadastro');
    Route::post('/profile/cadastrar/create', [CadastroController::class, 'cadastroCreate'])->name('profile.cadastro.create');



    Route::middleware('cadastrado')->group(function () {

        Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
        Route::post('/like-dislike', [HomeController::class, 'likeDislike'])->name('action.like.dislike');


        Route::get('/profile', [ProfileController::class, 'perfil'])->name('profile.edit');
        Route::post('/profile/adicionar-foto', [ProfileController::class, 'adicionarFoto'])->name('profile.adicionar.foto');
        Route::post('/profile/excluir-foto', [ProfileController::class, 'excluirFoto'])->name('profile.excluir.foto');
        Route::delete('/profile/deletar', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        
        Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
        Route::post('/chat/acess', [ChatController::class, 'chat'])->name('chat.acess');

    });
});

require __DIR__.'/auth.php';
