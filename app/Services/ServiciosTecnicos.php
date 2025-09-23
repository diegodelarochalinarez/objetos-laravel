<?php

namespace App\Services;

use App\Models\Operacion;
use App\Models\OperacionDominio;
use Exception;

class ServiciosTecnicos
{
    private static ?self $serviciosTecnicos= null;

    private function __construct()
    {
    }
    public static function getInstance()
    {
        if(self::$serviciosTecnicos== null){
            self::$serviciosTecnicos= new self();
        }
        return self::$serviciosTecnicos;
    }

    private function __clone(): void
    {
        // Impide clonar la instancia
    }

    public function buscar(OperacionDominio $op):?OperacionDominio{
        $operacionM =Operacion::where(['operacion' => $op->getTipo(), 'valor' => $op->getN()])->first();
        if($operacionM == null){
            return null;
        }
        return $operacionM->getObjeto();
    }

    public function save(OperacionDominio $op):void{
        $op = new Operacion($op);
        $op->save();
    }
    public function __wakeup(): void
    {
        throw new \Exception('No se puede deserializar una instancia singleton.');
    }

}
