<?php

class Funcionario{
    public $nome;
    public $salario;

    public function __construct($nome, $salario){
        $this->nome = $nome;
        $this->salario = $salario;
    }
}

class Gerente extends Funcionario{
    public function aumentarSalario($valor){
        $this->salario = $this->salario+$valor;
    }
}

$gerente = new Gerente('José Carlos', 3000);
echo("Salário inicial:  $gerente->salario");
$gerente->aumentarSalario(250);
echo("\nSalário aumentado: $gerente->salario");