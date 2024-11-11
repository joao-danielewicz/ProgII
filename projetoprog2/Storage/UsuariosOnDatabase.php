<?php
namespace Storage;

require_once "..\Models\Usuario.php";
require_once "Utils.php";
use DateTime;


class UsuariosOnDatabase{
    private $conexao;
    
    public function __construct($bdServidor = 'localhost', $bdUsuario = 'root', $bdSenha = 'root', $bdBanco = 'tarefas', $port = '3306'){
        $this->conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, $port);
    }

    private function EncryptPassword($senha){
        return (hash_pbkdf2("sha256", $senha, 'sdgb4433bn6bsfwbsf', 60000));
    }
    
    private function VerificarLogin($login){
        $sqlBusca = "SELECT * FROM usuarios WHERE usuarios.email = '{$login['email']}'";
        $resultado = $resultado = mysqli_query($this->conexao, $sqlBusca);
        $usuario = mysqli_fetch_assoc($resultado);   

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

    public function Insert($usuario){
        $usuario['senha'] = $this->EncryptPassword($usuario['senha']);
        $sqlInsert = "INSERT INTO usuarios (nome, email, senha)
                VALUES(
                    '{$usuario['nome']}',
                    '{$usuario['email']}',                    
                    '{$usuario['senha']}'
            )";
        return mysqli_query($this->conexao, $sqlInsert);
    }
    
    public function Update($tarefa){
        
    }

    
    public function Delete($usuario){
        $sqlDelete = "DELETE FROM usuarios WHERE idUsuario = '{$usuario['idusuario']}'";
        return mysqli_query($this->conexao, $sqlDelete);
    }
}