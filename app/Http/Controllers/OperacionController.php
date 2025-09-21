<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operacion;
use App\DomainModel\Modelo;

class OperacionController extends Controller
{
    private Modelo $modelo;
    public function __construct(Modelo $modelo){
        $this->modelo = $modelo;
    }
    public function limpiarBtn(){
      return view('vista', ['operacion' => new Operacion()]);
    }

    public function calculosBtn($tipo ,Request $request) {
        $n = $request->input('n');
        $operacion = $this->modelo->calcularOperacion($tipo, $n);
        return view('vista', ['operacion' => $operacion]);
    }
}
