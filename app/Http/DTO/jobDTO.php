<?php

namespace App\Http\DTO;

class JobDTO
 {
    public string $titulo;
    public float $salario;

    public function __construct(string $titulo, float $salario){
        $this->titulo = $titulo;
        $this->salario = $salario;
    }

    public static function fromRequest($request): self{
        return new self(
            $request->titulo,
            $request->salario
        );
    }
 }
