<?php
namespace App\DomainModel;
use App\Models\Operacion;
use App\Services\ServiciosTecnicos;

class Modelo
{
    private ServiciosTecnicos $serviciosTecnicos;

    public function __construct()
    {
        $this->serviciosTecnicos = ServiciosTecnicos::getInstance();
    }
  public function calcularOperacion($tipo, $n): Operacion{
    switch ($tipo) {
        case 'factorial':
            return $this->factorial($n);
        case 'fibonacci':
            return $this->fibonacci($n);
        case 'ackerman':
            $operacion = $this->serviciosTecnicos->buscar(new Operacion('ackerman', $n));
            if($operacion != null){
                return $operacion;
            }
            $resultado = $this->ackerman($n);
            $operacion = new Operacion('ackerman', $n, $resultado);
            $this->serviciosTecnicos->save($operacion);
            return $operacion;
        default:
            return new Operacion($tipo, $n, 0);
    }
  }

  private  function factorial($n) : Operacion {
        $operacion = $this->serviciosTecnicos->buscar(new Operacion('factorial', $n));
        if($operacion != null){
            return $operacion;
        }
      if ($n == 0 || $n == 1){
          $operacion = new Operacion( 'factorial', $n, 1);
          $this->serviciosTecnicos->save($operacion);
          return $operacion;
      }
      $operacion = new Operacion('factorial', $n, $n * $this->factorial($n - 1)->getResultado());
      $this->serviciosTecnicos->save($operacion);
      return $operacion;
  }

  private  function fibonacci($n) : Operacion {
      $operacion = $this->serviciosTecnicos->buscar(new Operacion( 'fibonacci', $n));
      if($operacion != null){
          return $operacion;
      }
      if($n < 2) {
          $operacion = new Operacion( 'fibonacci', $n, $n);
          $this->serviciosTecnicos->save($operacion);
          return $operacion;
      }
      $operacion = new Operacion("fibonacci", $n, $this->fibonacci($n - 1)->getResultado() + $this->fibonacci($n - 2)->getResultado());
      $this->serviciosTecnicos->save($operacion);
      return $operacion;
  }

  private function ackerman($n,$m=1) : int {
      if ($m == 0) {
          return $n + 1;
      } elseif ($n == 0) {
          return $this->ackerman(1, $m-1);
      }
      return $this->ackerman($this->ackerman($n-1,$m),$m-1);
  }
}
