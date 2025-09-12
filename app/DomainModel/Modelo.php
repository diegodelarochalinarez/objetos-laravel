<?php
namespace App\DomainModel;
use App\Models\Operacion;

class Modelo
{
  public static function calcularOperacion($tipo, $n){ 
    $operacion = Operacion::where(['operacion' => $tipo, 'valor' => $n])->first();
    
    if ($operacion !== null) {
        return $operacion;
    } 

    switch ($tipo) {
        case 'factorial':
            $resultado = Modelo::factorial($n);
            break;
        case 'fibonacci':
            $resultado = Modelo::fibonacci($n);
            break;
        case 'ackerman':
            $resultado = Modelo::ackerman(1, $n);
            break;
        default:
            $resultado = 0;
            break;
    }

    $operacion = new Operacion($tipo, $n, $resultado);

    Operacion::create($operacion->toArray());

    return $operacion;
  }
  
  private static function factorial($n) : int {
      if ($n == 0 || $n == 1) return 1;
      return $n * self::factorial($n - 1);
  }

  private static function fibonacci($n) : int {
      if($n < 2) return $n;
      return self::fibonacci($n - 1) + self::fibonacci($n - 2);
  }

  private static function ackerman($m = 1, $n) : int {
      if ($m == 0) {
          return $n + 1;
      } elseif ($n == 0) {
          return self::ackerman($m - 1, 1);
      } 
      return self::ackerman($m - 1, self::ackerman($m, $n - 1));
  }
}
