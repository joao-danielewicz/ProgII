<?php
namespace Views;
require_once "..\config.php";


if(isset($_POST)){
    if(isset($_POST['adicionar'])){
        unset($_POST['adicionar']);
        $cursosController->InsertCurso($_POST);
    }
    if(isset($_POST['editar'])){
        unset($_POST['editar']);
        $cursosController->UpdateCurso($_POST);
    }
    if(isset($_POST['remover'])){
        unset($_POST['remover']);
        $cursosController->DeleteCurso($_POST);
    }
}
header('location: CursoView.php');