<?php

class CursosController extends RenderView{
    private $method;
    
    public function __construct($method){
        $this->method = $method;
    }

    public function index(){
        if(empty($_COOKIE)){
            header('Location: /');
            die();
        }
        session_start();
        $this->loadView('/CursoView', [
            'cursos' => $this->GetCursos($_SESSION['usuario']->idUsuario)
        ]);
    }

    public function InsertCurso($curso){
        if(!empty($curso)){
            $this->method->Insert($curso);
            session_start();
            $_SESSION['usuario']->cursos = [];
            foreach($this->GetCursos($_SESSION['usuario']->idUsuario) as $cursos){
                $_SESSION['usuario']->cursos[] = $cursos->idCurso;
            }

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
        return $this->method->Update($post);
    }

    public function DeleteCurso($post){
        return $this->method->Delete($post);
    }
}