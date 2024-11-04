<?php
namespace Views;
require_once "..\config.php";


if(isset($_POST)){
    if(isset($_POST['adicionar'])){
        unset($_POST['adicionar']);
        $usuariosController->InsertUsuario($_POST);
    }
    if(isset($_POST['editar'])){
        unset($_POST['editar']);
        $usuariosController->UpdateUsuario($_POST);
    }
    if(isset($_POST['remover'])){
        unset($_POST['remover']);
        $usuariosController->DeleteUsuario($_POST);
    }
}
header('location: CursoView.php');