<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\isLogged;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\PontoController;
use App\Http\Controllers\UserController;


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerSubmit', [AuthController::class, 'storeRegister'])->name('register.store');
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/gerar-pdf', [AcessoController::class, 'generatePDF'])->name('pdf');

Route::middleware(CheckAdmin::class)->group(function () {
    Route::get('/pontos', [PontoController::class, 'indexPontos'])->name('pontos.index');
    Route::get('/pontos/pdf', [PontoController::class, 'pontosPDF'])->name('pontos.pdf');

    Route::get('/usuarios', [UserController::class, 'listarUsuarios'])->name('usuarios.listar');
    Route::get('/usuarios/pdf', [UserController::class, 'usuariosPDF'])->name('usuarios.pdf');
});

Route::middleware(isLogged::class)->group(function () {
    Route::get('/acessos', [AcessoController::class, 'index'])->name('acessos.index');
    Route::get('/acessos/create', [AcessoController::class, 'createAcesso'])->name('acessos.create');
    Route::post('/acessos', [AcessoController::class, 'storeAcesso'])->name('acessos.store');
    Route::get('/acessos/{id}', [AcessoController::class, 'show'])->name('acessos.show');
    Route::get('/acessos/{id}/edit', [AcessoController::class, 'edit'])->name('acessos.edit');
    Route::put('/acessos/{id}', [AcessoController::class, 'updateAcesso'])->name('acessos.update');
    Route::delete('/acessos/{id}', [AcessoController::class, 'destroy'])->name('acessos.destroy');

    Route::get('/pontos/entrada', [PontoController::class, 'createEntrada'])->name('pontos.entrada.create');
    Route::post('/pontos/entrada', [PontoController::class, 'storeEntrada'])->name('pontos.entrada.store');
    Route::get('/pontos/saida', [PontoController::class, 'createSaida'])->name('pontos.saida.create');
    Route::post('/pontos/saida', [PontoController::class, 'storeSaida'])->name('pontos.saida.store');
    Route::get('/meus-pontos', [PontoController::class, 'meusPontos'])->name('pontos.meusPontos');
    Route::get('/meus-pontos-pdf', [PontoController::class,'meuspontosPDF'])->name('meus-pontos.pdf');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

});
