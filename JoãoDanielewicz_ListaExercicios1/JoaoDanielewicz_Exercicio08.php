<?php

interface OperacaoBancaria{
    public function Executar($valor);
}

class Deposito implements OperacaoBancaria{
    public function Executar($valor){
        return "Você adicionou $valor à sua conta.";
    }
}

class Saque implements OperacaoBancaria{
    public function Executar($valor){
        return "Você removeu $valor da sua conta.";
    }
}

$deposito = new Deposito();
$saque = new Saque();

echo($deposito->Executar(200));
echo("\n". $saque->Executar(50));