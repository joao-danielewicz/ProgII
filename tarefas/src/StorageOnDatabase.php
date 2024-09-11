<?php
namespace Tarefas;
class StorageOnDatabase{
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

    public function Insert($tarefa){
        $sqlInsert = "INSERT INTO tarefas (nome, descricao, prioridade, prazo, concluida)
                VALUES(
                '{$tarefa['nome']}',
                '{$tarefa['descricao']}',
                '{$tarefa['prioridade']}',
                '{$tarefa['prazo']}',
                '{$tarefa['concluida']}'
            )";
        return mysqli_query($this->conexao, $sqlInsert);
    }
    
    public function Update($tarefa){
        $sqlUpdate = "UPDATE tarefas SET 
                    nome = '{$tarefa['nome']}',
                    descricao = '{$tarefa['descricao']}',
                    prioridade = '{$tarefa['prioridade']}',
                    prazo = '{$tarefa['prazo']}',
                    concluida = '{$tarefa['concluida']}'
                    WHERE
                    id = '{$tarefa['id']}'";
        return mysqli_query($this->conexao, $sqlUpdate);
    }
    
    public function Delete($tarefa){
        $sqlDelete = "DELETE FROM tarefas WHERE id = '{$tarefa['id']}'";
        return mysqli_query($this->conexao, $sqlDelete);
    }
}