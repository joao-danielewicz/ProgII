<?php

class Produto {
    public $nome;
    public $preco;
    public $estoque;

    public function __construct($nome, $preco, $estoque){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function vender($quantidade){
        if($this->estoque >= $quantidade){
            $this->estoque = $this->estoque-$quantidade;
            echo "\nVenda realizada com sucesso.";
        }else{
            echo "\nEstoque insuficiente. A venda não pôde ser realizada.";
        }
        echo "\nEstoque atual: ".$this->estoque;
    }
}


$produto = new Produto('Banana', 1.99, 20);
$produto->vender(19);
$produto->vender(2);
