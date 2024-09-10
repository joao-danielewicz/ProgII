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
        
        return $this->BuildTarefasFromDatabase($tarefas);
    }

    private function BuildTarefasFromDatabase($listaTarefas){
        $tarefasObj = [];
        foreach($listaTarefas as $tarefa){
            $tarefasObj[] = new Tarefa($tarefa['id'], $tarefa['nome'], $tarefa['descricao'], $tarefa['prioridade'], $tarefa['prazo'], $tarefa['concluida']);
        }
        return $tarefasObj;
    }


    public function Insert($tarefa){
        if(isset($tarefa['concluida'])){
            $tarefa['concluida'] = 1;
        }else {
            $tarefa['concluida'] = 0;
        }
        $sqlInsert = "INSERT INTO tarefas (nome, descricao, prioridade, prazo, concluida)
                        VALUES(
                        '{$tarefa['nome']}',
                        '{$tarefa['descricao']}',
                        '{$tarefa['prioridade']}',
                        '{$tarefa['prazo']}',
                        '{$tarefa['concluida']}'
                    )";
        return(mysqli_query($this->conexao, $sqlInsert));
    }
}