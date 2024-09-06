<?php
include "config.php";


if(isset($_POST)){
    $tarefasController->Adicionar($_POST);
    $_SESSION['lista_tarefas'] = $tarefasController->GetTarefas();
}

header('location: ../TarefaForm.php');