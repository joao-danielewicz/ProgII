<?php
namespace Controllers;
use Models\Usuario;

class UsuariosController{
    private $method;

    public function __construct($method){
        $this->method = $method;
    }

    public function InsertCurso($usuario){
        $this->method->Insert($usuario);
    }
    
    public function VerificarLogin($email){
        return $this->method->ValidarLogin($email);
    }
    
    public function UpdateCurso($post){
        return $this->method->Update($post);
    }

    public function DeleteCurso($post){
        return $this->method->Delete($post);
    }
}