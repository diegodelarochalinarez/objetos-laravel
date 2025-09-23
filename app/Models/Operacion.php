<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    public function __construct(OperacionDominio $operacionDominio = new OperacionDominio(null, null, null))
    {
        $tipo = $operacionDominio->getTipo();
        $n = $operacionDominio->getN();
        $resultado = $operacionDominio->getResultado();
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

    public function getObjeto()
    {
        $objeto = new OperacionDominio($this->getAttribute('operacion'), $this->getAttribute('valor'), $this->getAttribute('resultado'));
        return $objeto;
    }

    protected function setKeysForSaveQuery($query)
    {
        return $query
            ->where('operacion', $this->getAttribute('operacion'))
            ->where('valor', $this->getAttribute('valor'));
    }

    protected $fillable = ['operacion', 'valor', 'resultado'];
}
