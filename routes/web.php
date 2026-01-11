<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GadoController;
use App\Http\Controllers\FazendaController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Rota inicial
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rotas do sistema Fazenda Bovinos
|--------------------------------------------------------------------------
*/

// 🩸 RELATÓRIO DE ANIMAIS ABATIDOS
Route::get('/gados/abatidos', [GadoController::class, 'abatidos'])
    ->name('gados.abatidos');

// 🩸 Rota para ABATER o gado
Route::put('/gados/{id}/abater', [GadoController::class, 'abater'])
    ->name('gados.abater');

// CRUD de Gados
Route::resource('gados', GadoController::class);

// CRUD de Fazendas
Route::resource('fazendas', FazendaController::class);

// CRUD de Veterinários
Route::resource('veterinarios', VeterinarioController::class);
