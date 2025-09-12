<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operacion;
use App\DomainModel\Modelo;

class OperacionController extends Controller
{
    public function limpiarBtn(){
      return view('vista', ['operacion' => new Operacion()]);
    }

    public function calculosBtn($tipo = null, Request $request) {
        $n = $request->query('n');
        $operacion = Modelo::calcularOperacion($tipo, $n);
        return view('vista', ['operacion' => $operacion]);
    }
}
