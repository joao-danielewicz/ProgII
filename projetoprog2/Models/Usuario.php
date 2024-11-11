<?php

class Usuario extends Database{
    private $conexao;
    public int $idUsuario;
    public string $nome;
    public string $email;

    public function __construct(int $idUsuario, string $nome, string $email){
        $this->conexao = $this->getConnection();
        $this->idUsuario=$idUsuario;
        $this->nome=$nome;
        $this->email=$email;
    }

    private function VerificarLogin($login){
        $sqlBusca = "SELECT * FROM usuarios WHERE usuarios.email = '{$login['email']}'";
        $resultado = $resultado = query($this->conexao, $sqlBusca);
        $usuario = fetch_assoc($resultado);   

        if(!$usuario){
            return false;
        }
        if($this->EncryptPassword($login['senha']) !== $usuario['senha'] ){
            return false;
        }

        unset($usuario['senha']);
        return $usuario;
    }

    public function ValidarLogin($login){
        $usuario = $this->VerificarLogin($login);
        return $usuario;
    }
}