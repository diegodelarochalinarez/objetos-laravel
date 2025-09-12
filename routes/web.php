<?php

use Illuminate\Support\Facades\Route;
use App\Models\Operacion;
use App\Http\Controllers\OperacionController;

Route::get('/', [OperacionController::class, 'limpiarBtn']);
Route::get('/{tipo}', [OperacionController::class, 'calculosBtn']);

