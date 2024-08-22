<?php

class Pessoa{
    public $nome;
    public $altura;
    public $peso;

    public function __construct($nome, $peso, $altura){
        $this->nome = $nome;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function calcularIMC(){
        return $this->peso/($this->altura**2);
    }

    public function apresentar(){
        return "Nome: $this->nome. Altura: $this->altura. Peso: $this->peso.";
    }
}


