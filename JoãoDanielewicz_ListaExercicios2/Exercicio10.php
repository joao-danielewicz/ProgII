<?php

class BancoDeDados{
    private $conexao;
    
    public function __construct($bdServidor = 'localhost', $bdUsuario = 'root', $bdSenha = 'root', $nomeBanco = 'empresa'){
        $this->conexao = new PDO("mysql:host=$bdServidor;dbname=$nomeBanco", $bdUsuario, $bdSenha);
    }

    public function buscarClientes(){
        $consulta = $this->conexao->query("SELECT * FROM clientes");

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }
}

$bd = new BancoDeDados();

foreach($bd->buscarClientes() as $cliente){
    var_dump($cliente);
}