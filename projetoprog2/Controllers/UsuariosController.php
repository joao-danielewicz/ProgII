<?php
use Models\Usuario;


class UsuariosController{
    private $method;

    public function __construct($method){
        $this->method = $method;
    }
    public function index(){
        echo "users";
    }

    public function InsertUsuario($usuario){
        $this->method->Insert($usuario);
    }
    
    public function VerificarLogin($login){
        $usuario = $this->method->ValidarLogin($login);
        if($usuario){
            session_start();
            $_SESSION['usuario'] = new Usuario($usuario['idUsuario'], $usuario['nome'], $usuario['email']);
        }
        return $usuario;
    }
    
    public function UpdateUsuario($post){
        return $this->method->Update($post);
    }

    public function DeleteUsuario($post){
        return $this->method->Delete($post);
    }
}