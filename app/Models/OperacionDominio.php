<?php

namespace App\Models;

class OperacionDominio
{
    private ?string $tipo;
    private ?int $n;
    private ?int $resultado;
    public function __construct(?string $tipo = null, ?int $n= null, ?int $resultado = null)
    {
        $this->tipo = $tipo;
        $this->n = $n;
        $this->resultado = $resultado;
    }
    public function getTipo(): ?string
    {
        return $this->tipo;
    }
    public function getN(): ?int
    {
        return $this->n;
    }
    public function getResultado(): ?int
    {
        return $this->resultado;
    }
    public function setTipo(?string $tipo= null): void
    {
        $this->tipo = $tipo;
    }
    public function setN(?int $n = null): void
    {
        $this->n = $n;
    }
    public function setResultado(?int $resultado = null): void
    {
        $this->resultado = $resultado;
    }
}
