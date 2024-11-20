<?php

class UsuariosController extends RenderView{
    private $method;

    public function __construct($method){
        $this->method = $method;
    }
    public function login($msg = ''){
        $this->loadView('/login',
        [
            'msg' => $msg
        ]);
    }

    public function cadastro($msg = ''){
        $this->loadView('/cadastro',
        [
            'msg' => $msg
        ]);
    }

    public function InsertUsuario($usuario){
        if(!empty($usuario)){
            if($this->method->Insert($usuario)){
                header('Location: /login');
                die();
            }else {
                $msg = "Este e-mail já está em uso.";
                return $this->cadastro($msg);
            }
        }
        header('Location: /');
    }

    public function VerificarLogin($login){
        if(!empty($login)){
            $usuario = $this->method->ValidarLogin($login);
            if($usuario){
                session_start();
                $_SESSION['usuario'] = new Usuario($usuario['idUsuario'],
                                                $usuario['nome'],
                                                $usuario['email'],
                                                $usuario['cursos'],
                                                new DateTime($usuario['dataNascimento']),
                                                $usuario['telefone']);
                header('Location: /');
            }
        }
        return $this->login('Erro. Verifique seu login.');
    }
    
    public function UpdateUsuario($post){
        return $this->method->Update($post);
    }

    public function DeleteUsuario($post){
        return $this->method->Delete($post);
    }
}