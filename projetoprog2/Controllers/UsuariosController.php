<?php

class UsuariosController extends RenderView{
    private $method;

    public function __construct($method){
        $this->method = $method;
    }
    public function index($msg = ''){
        $this->loadView('/UsuarioView',
        [
            'title' => 'Login',
            'msg' => $msg
        ]);
    }

    public function InsertUsuario($usuario){
        if($this->method->Insert($usuario)){
            $msg = "Cadastro concluído com sucesso.";
        }else {
            $msg = "Este e-mail já está em uso.";
        }
        return $this->index($msg);
    }

    public function VerificarLogin($login){
        $usuario = $this->method->ValidarLogin($login);
        if($usuario){
            session_start();
            $_SESSION['usuario'] = new Usuario($usuario['idUsuario'], $usuario['nome'], $usuario['email']);
            return $this->index('Login bem-sucedido.');
        }
        return $this->index('Erro. Verifique seu login.');
    }
    
    public function UpdateUsuario($post){
        return $this->method->Update($post);
    }

    public function DeleteUsuario($post){
        return $this->method->Delete($post);
    }
}