<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    public function __construct($tipo = null, $n = null, $resultado = null)
    {
        parent::__construct();
        if ($tipo !== null) {
            $this->setAttribute('operacion', $tipo);
        }
        if ($n !== null) {
            $this->setAttribute('valor', $n);
        }
        if ($resultado !== null) {
            $this->setAttribute('resultado', $resultado);
        }
    }

    public function getOperacion()
    {
        return $this->getAttribute('operacion');
    }
    public function getValor()
    {
        return $this->getAttribute('valor');
    }
    public function getResultado()
    {
        return $this->getAttribute('resultado');
    }

    protected function setKeysForSaveQuery($query)
    {
        return $query
            ->where('operacion', $this->getAttribute('operacion'))
            ->where('valor', $this->getAttribute('valor'));
    }

    protected $fillable = ['operacion', 'valor', 'resultado'];
}
