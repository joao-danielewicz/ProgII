<?php
namespace Views;
require_once "..\config.php";


if(isset($_POST)){
    if(isset($_POST['adicionar'])){
        unset($_POST['adicionar']);
        $tarefasController->InsertTarefa($_POST);
    }
    if(isset($_POST['editar'])){
        unset($_POST['editar']);
        $tarefasController->UpdateTarefa($_POST);
    }
    if(isset($_POST['remover'])){
        unset($_POST['remover']);
        $tarefasController->DeleteTarefa($_POST);
    }
    if(isset($_POST['estudar'])){
        // unset($_POST['estudar']);
        $tarefasController->EstudarTarefa($_POST);
    }
}
header('location: TarefaView.php');