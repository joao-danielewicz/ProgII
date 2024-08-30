<?php
session_start(); 

if (isset($_POST['gravar'])) {
    $tarefa = [
        'nome' => $_POST['nome'],
        'data' => $_POST['data'],
        'prioridade' => $_POST['prioridade']
    ];
    if (!isset($_POST['status'])) {
        $tarefa['status'] = 'Pendente';
    } else {
        $tarefa['status'] = 'Terminada';
    }
    
    $_SESSION['lista_tarefas'][] = $tarefa;
}

if (isset($_SESSION['lista_tarefas'])) {
    $lista_tarefas = $_SESSION['lista_tarefas'];
} else {
    $lista_tarefas = [];
}

include "template.php";