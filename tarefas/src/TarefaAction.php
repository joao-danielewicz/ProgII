<?php
namespace Tarefas;
require_once "config.php";


if(isset($_POST)){
    $tarefasController->Adicionar($_POST);
}

header('location: ../TarefaForm.php');