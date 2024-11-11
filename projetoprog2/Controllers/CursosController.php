<?php
namespace Controllers;
use Models\Curso;
use DateTime;
use Storage\CursosOnDatabase;

class CursosController{
    private $method;

    public function index(){
        echo "Cursos";
    }
    
    public function __construct(){
        $this->method = new CursosOnDatabase();
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