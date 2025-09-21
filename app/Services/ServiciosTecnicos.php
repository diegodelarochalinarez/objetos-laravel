<?php

namespace App\Services;

use App\Models\Operacion;
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

    public function buscar(Operacion $op):?Operacion{
        return Operacion::where(['operacion' => $op->getOperacion(), 'valor' => $op->getValor()])->first();
    }

    public function save(Operacion $op):void{
        // Persist the given model instance using its current attributes
        $op->save();
    }
    public function __wakeup(): void
    {
        throw new \Exception('No se puede deserializar una instancia singleton.');
    }

}
