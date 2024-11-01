<?php
namespace Storage;

require_once "..\Models\Curso.php";
require_once "Utils.php";
use DateTime;


class CursosOnDatabase{
    private $conexao;
    
    public function __construct($bdServidor = 'localhost', $bdUsuario = 'root', $bdSenha = 'root', $bdBanco = 'tarefas', $port = '3306'){
        $this->conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, $port);
    }
    
    
    public function SelectAllCursos(){
        $sqlBusca = 'SELECT * FROM cursos';
        $resultado = mysqli_query($this->conexao, $sqlBusca);
        
        $cursos = [];
        while($curso = mysqli_fetch_assoc($resultado)){
            $cursos[] = $curso;
        }
        
        return $cursos;
    }

    public function Insert($curso){
        $curso['idUsuario'] = 1;
        $sqlInsert = "INSERT INTO cursos (nome, areaConhecimento, quantidadeNovasTarefas, idUsuario)
                        VALUES(
                        '{$curso['nome']}',
                        '{$curso['areaConhecimento']}',
                        '{$curso['quantidadeNovasTarefas']}',
                        '{$curso['idUsuario']}'
                    )";
        return mysqli_query($this->conexao, $sqlInsert);
    }
    
    public function Update($curso){
        $sqlUpdate = "UPDATE cursos SET 
                    nome = '{$curso['nome']}',
                    areaConhecimento = '{$curso['areaConhecimento']}',
                    quantidadeNovasTarefas = '{$curso['quantidadeNovasTarefas']}'
                    WHERE
                    idCurso = '{$curso['idCurso']}'";
        return mysqli_query($this->conexao, $sqlUpdate);
    }

    
    public function Delete($curso){
        $sqlDelete = "DELETE FROM cursos WHERE idCurso = '{$curso['idCurso']}'";
        return mysqli_query($this->conexao, $sqlDelete);
    }
}