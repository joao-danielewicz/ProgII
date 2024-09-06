<?php
namespace Tarefas;
require_once "TarefasController.php";
require_once "TarefasOnCsv.php";
include "../banco.php";
session_start();

if(isset($_POST)){
    var_dump($_POST);
    if(inserir_tarefa($_POST, $conexao)==true){
        $_SESSION['msg'] = "Tarefa inserida com sucesso";
    };
    // está pulando o controller
}

header('location: ../TarefaForm.php');