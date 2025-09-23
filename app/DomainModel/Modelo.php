<?php
namespace App\DomainModel;
use App\Models\Operacion;
use App\Models\OperacionDominio;
use App\Services\ServiciosTecnicos;

class Modelo
{
    private ServiciosTecnicos $serviciosTecnicos;

    public function __construct()
    {
        $this->serviciosTecnicos = ServiciosTecnicos::getInstance();
    }
  public function calcularOperacion($tipo, $n): OperacionDominio{
    switch ($tipo) {
        case 'factorial':
            return $this->factorial($n);
        case 'fibonacci':
            return $this->fibonacci($n);
        case 'ackerman':
            $operacion = $this->serviciosTecnicos->buscar(new OperacionDominio('ackerman', $n));
            if($operacion != null){
                return $operacion;
            }
            $resultado = $this->ackerman($n);
            $operacion = new OperacionDominio('ackerman', $n, $resultado);
            $this->serviciosTecnicos->save($operacion);
            return $operacion;
        default:
            return new Operacion($tipo, $n, 0);
    }
  }

  private  function factorial($n) : OperacionDominio {
        $operacion = $this->serviciosTecnicos->buscar(new OperacionDominio('factorial', $n));
        if($operacion != null){
            return $operacion;
        }
      if ($n == 0 || $n == 1){
          $operacion = new OperacionDominio( 'factorial', $n, 1);
          $this->serviciosTecnicos->save($operacion);
          return $operacion;
      }
      $operacion = new OperacionDominio('factorial', $n, $n * $this->factorial($n - 1)->getResultado());
      $this->serviciosTecnicos->save($operacion);
      return $operacion;
  }

  private  function fibonacci($n) : OperacionDominio{
      $operacion = $this->serviciosTecnicos->buscar(new OperacionDominio( 'fibonacci', $n));
      if($operacion != null){
          return $operacion;
      }
      if($n < 2) {
          $operacion = new OperacionDominio( 'fibonacci', $n, $n);
          $this->serviciosTecnicos->save($operacion);
          return $operacion;
      }
      $operacion = new OperacionDominio("fibonacci", $n, $this->fibonacci($n - 1)->getResultado() + $this->fibonacci($n - 2)->getResultado());
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
