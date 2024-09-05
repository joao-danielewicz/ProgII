<?php
namespace Tarefas;
require_once "TarefasController.php";
require_once "TarefasOnCsv.php";
session_start();

$method = new TarefasOnCsv("tarefas.csv");
$tarefasController = new TarefasController($method);
if(isset($_POST)){
    $tarefasController->Adicionar($_POST);
    $_SESSION['lista_tarefas'] = $tarefasController->GetTarefas();
}

header('location: TarefaForm.php');