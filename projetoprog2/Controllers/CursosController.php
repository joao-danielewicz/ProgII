<?php

class CursosController extends RenderView{
    private $method;
    
    public function __construct($method){
        $this->method = $method;
    }

    public function index(){
        session_start();
        $this->loadView('/CursoView', [
            'cursos' => $this->GetCursos($_SESSION['usuario']->idUsuario)
        ]);
    }

    public function InsertCurso($curso){
        $this->method->Insert($curso);
    }
    
    public function GetCursos($idUsuario){
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
            require_once __DIR__.'/../Views/CursoView.php';
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