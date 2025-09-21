<?php

use Illuminate\Support\Facades\Route;
use App\Models\Operacion;
use App\Http\Controllers\OperacionController;

Route::get('/', [OperacionController::class, 'limpiarBtn']);
Route::post('/{tipo}', [OperacionController::class, 'calculosBtn'])
    ->where('tipo', '^(factorial|fibonacci|ackerman)$');


