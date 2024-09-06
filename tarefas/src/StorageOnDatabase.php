<?php
namespace Tarefas;
class StorageOnDatabase{
    private $conexao;
    
    public function __construct($bdServidor = 'localhost', $bdUsuario = 'root', $bdSenha = 'root', $bdBanco = 'tarefas', $port = '3306'){
        $this->conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, $port);
    }

    
    function SelectAllTarefas(){
        $sqlBusca = 'SELECT * FROM tarefas';
        $resultado = mysqli_query($this->conexao, $sqlBusca);
        
        $tarefas = [];
        while($tarefa = mysqli_fetch_assoc($resultado)){
            $tarefas[] = $tarefa;
        }
        
        return $tarefas;
    }
    function Insert($tarefa){
        if($tarefa['concluida'] == "on"){
            $tarefa['concluida'] = 1;
        }else {
            $tarefa['concluida'] = 0;
        }
        $sqlInsert = "INSERT INTO tarefas (nome, descricao, prioridade, prazo, concluida)
    VALUES(
    '{$tarefa['nome']}',
    '{$tarefa['descricao']}',
    '{$tarefa['prioridade']}',
    '20240916',
    '{$tarefa['concluida']}'
    )";
    return(mysqli_query($this->conexao, $sqlInsert));
}
}