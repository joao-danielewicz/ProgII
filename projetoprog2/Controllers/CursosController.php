<?php
namespace Controllers;
use Models\Curso;
use DateTime;



class CursosController{
    private $method;

    public function __construct($method){
        $this->method = $method;
    }

    public function InsertCurso($curso){
        $this->method->Insert($curso);
    }
    
    public function GetCursos(){
        $listaCursos = $this->method->SelectAllCursos();
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