<?php
namespace Tarefas;
require_once "config.php";
require_once "Utils.php";


if(isset($_POST)){
    if(isset($_POST['adicionar'])){
        unset($_POST['adicionar']);
        
        if(!empty($_FILES['midia']['name'])){
            $_POST['midia'] = pegarImagem($_FILES);
            var_dump($_POST['midia']);
        }else{
            $_POST['midia'] = null;
        }
        
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
}
header('location: TarefaView.php');