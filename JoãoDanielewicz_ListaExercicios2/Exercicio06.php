<?php

class Cliente{
    public string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;        
    }
}

class Pedido{
    public int $numeroPedido;
    public Cliente $cliente;

    public function __construct(int $numeroPedido)
    {
        $this->numeroPedido = $numeroPedido;   
    }

    public function adicionarCliente(Cliente $cliente){
        $this->cliente = $cliente;
    }
}

$novoCliente = new Cliente('João Danielewicz');
$pedido = new Pedido(20);

echo ("Pedido sem cliente: ");
var_dump($pedido);

$pedido->adicionarCliente($novoCliente);
echo ("Pedido com cliente: ");
var_dump($pedido);