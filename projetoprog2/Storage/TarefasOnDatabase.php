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
    
    
    public function SelectAllTarefas($idCurso){
        $sqlBusca = "SELECT * FROM tarefas WHERE tarefas.idCurso = '{$idCurso}' ";
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
        if(!empty($_FILES['midiaPergunta']['name'])){
            $tarefa['midiaPergunta'] = pegarImagem($_FILES['midiaPergunta']);
        }else{
            $tarefa['midiaPergunta'] = null;
        }

        if(!empty($_FILES['midiaResposta']['name'])){
            $tarefa['midiaResposta'] = pegarImagem($_FILES['midiaResposta']);
        }else{
            $tarefa['midiaResposta'] = null;
        }

        $sqlInsert = "INSERT INTO tarefas (assunto, pergunta, resposta, dataadicao, midiapergunta, midiaresposta, nivelestudo, idcurso)
                VALUES(
                    '{$tarefa['assunto']}',
                    '{$tarefa['pergunta']}',                    
                    '{$tarefa['resposta']}',                    
                    '{$tarefa['dataAdicao']}',
                    '{$tarefa['midiaPergunta']}',
                    '{$tarefa['midiaResposta']}',
                    '{$tarefa['nivelEstudo']}',
                    '{$tarefa['idCurso']}'
            )";
        return mysqli_query($this->conexao, $sqlInsert);
    }
    
    public function Update($tarefa){
        var_dump($tarefa);
        $sqlUpdate = "UPDATE tarefas SET 
                    assunto = '{$tarefa['assunto']}',
                    pergunta = '{$tarefa['pergunta']}',
                    resposta = '{$tarefa['resposta']}',
                    midiaPergunta = '{$tarefa['midiaPergunta']}',
                    midiaResposta = '{$tarefa['midiaResposta']}'
                    WHERE
                    idTarefa = '{$tarefa['idTarefa']}'";
        return mysqli_query($this->conexao, $sqlUpdate);
    }

    
    public function Delete($tarefa){
        $sqlDelete = "DELETE FROM tarefas WHERE idTarefa = '{$tarefa['idTarefa']}'";
        return mysqli_query($this->conexao, $sqlDelete);
    }
}