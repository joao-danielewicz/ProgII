<?php

class CursosController extends RenderView{
    private $method;
    
    public function __construct($method){
        $this->method = $method;
    }

    public function index($msg = ''){
        if(empty($_COOKIE)){
            header('Location: /');
            die();
        }
        session_start();
        $this->loadView('/Cursos/meuscursos', [
            'msg' => $msg,
            'titulo' => "RecapPro - Cursos",
            'cursos' => $this->GetCursos($_SESSION['usuario']->idUsuario)
        ]);
    }

    public function InsertCurso($curso){
        if(!empty($curso)){
            $this->method->Insert($curso);
            header("Location: /meuscursos");
            die();
        }
        header('Location: /');
    }
    
    private function GetCursos($idUsuario){
        $listaCursos = $this->method->SelectAllCursos($idUsuario);
        $buildCursos = [];
        if($listaCursos != null){
            foreach($listaCursos as $curso){
                $buildCursos[] = new Curso(
                    $curso['idCurso'], $curso['nome'], $curso['areaConhecimento'],
                    new DateTime($curso['dataAdicao']),
                    $curso['quantidadeNovasTarefas'],
                    $curso['idUsuario']
                );
            }
            return $buildCursos;
        }
        return null;
    }
   
    public function UpdateCurso($post){
        session_start();
        $post['idUsuario'] = $_SESSION['usuario']->idUsuario;
        session_abort();
        $this->method->Update($post);
        $this->index();
        die();
    }

    public function DeleteCurso($post){
        session_start();
        $post['idUsuario'] = $_SESSION['usuario']->idUsuario;
        session_abort();
        $this->method->Delete($post);
        $this->index();
        die();
    }
}