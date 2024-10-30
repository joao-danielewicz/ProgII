<?php
namespace Storage;

require_once "..\Models\Tarefa.php";
require_once "Utils.php";
use DateTime;


class TarefasOnDatabase{
    private $conexao;
    
    public function __construct($bdServidor = 'localhost', $bdUsuario = 'root', $bdSenha = 'root', $bdBanco = 'tarefas', $port = '3306'){
        $this->conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, $port);
    }
    
    
    public function SelectAllTarefas(){
        $sqlBusca = 'SELECT * FROM tarefas';
        $resultado = mysqli_query($this->conexao, $sqlBusca);
        
        $tarefas = [];
        while($tarefa = mysqli_fetch_assoc($resultado)){
            $tarefas[] = $tarefa;
        }
        
        return $tarefas;
    }
    
    public function SelectNovasTarefas(){
        $sqlBusca = 'SELECT * FROM tarefas WHERE tarefas.nivelEstudo = -1';
        $resultado = mysqli_query($this->conexao, $sqlBusca);
        
        $tarefas = [];
        while($tarefa = mysqli_fetch_assoc($resultado)){
            $tarefas[] = $tarefa;
        }
        
        return $tarefas;
    }


    public function Insert($tarefa){
        if(!empty($_FILES['midia']['name'])){
            $tarefa['midia'] = pegarImagem($_FILES);
        }else{
            $tarefa['midia'] = null;
        }

        $tarefa['dataAdicao'] = date_format(new DateTime('now'), "Y-m-d");
        $tarefa['nivelEstudo'] = -1;

        $sqlInsert = "INSERT INTO tarefas (assunto, pergunta, dataadicao, midia, nivelestudo)
                VALUES(
                    '{$tarefa['assunto']}',
                    '{$tarefa['pergunta']}',                    
                    '{$tarefa['dataAdicao']}',
                    '{$tarefa['midia']}',
                    '{$tarefa['nivelEstudo']}'
                    
            )";
        return mysqli_query($this->conexao, $sqlInsert);
    }
    
    public function Update($tarefa){
        $sqlUpdate = "UPDATE tarefas SET 
                    assunto = '{$tarefa['assunto']}',
                    pergunta = '{$tarefa['pergunta']}',
                    midia = '{$tarefa['midia']}',
                    dataadicao = '{$tarefa['dataadicao']}',
                    dataproximoestudo = '{$tarefa['dataproximoestudo']}',
                    dataultimoestudo = '{$tarefa['dataultimoestudo']}',
                    nivelestudo = '{$tarefa['nivelestudo']}'
                    idcurso = '{$tarefa['idcurso']}'
                    WHERE
                    id = '{$tarefa['id']}'";
        return mysqli_query($this->conexao, $sqlUpdate);
    }

    
    public function Delete($tarefa){
        $sqlDelete = "DELETE FROM tarefas WHERE id = '{$tarefa['id']}'";
        return mysqli_query($this->conexao, $sqlDelete);
    }
}