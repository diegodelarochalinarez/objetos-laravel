<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    public $timestamps = false;
    public function __construct($tipo = null, $n = null, $resultado = null) {
        $this->operacion = $tipo;
        $this->valor = $n;
        $this->resultado = $resultado;
    }

    protected $fillable = ['operacion', 'valor', 'resultado'];
}
