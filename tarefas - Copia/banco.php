<?php

$bdServidor = 'localhost';
$bdUsuario = 'root';
$bdSenha = 'root';                            
$bdBanco = 'tarefas';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, '3306');


function buscar_tarefas ($conexao){
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $tarefas = [];
    while($tarefa = mysqli_fetch_assoc($resultado)){
        $tarefas[] = $tarefa;
    }
    
    return $tarefas;
}
function inserir_tarefa($tarefa, $conexao){
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
    return(mysqli_query($conexao, $sqlInsert));
}