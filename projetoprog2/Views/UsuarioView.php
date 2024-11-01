<?php
namespace Views;
require "..\config.php";
session_start();



if($usuariosController->VerificarLogin('joao@joao.com')){
    echo("Email encontrado");
}else{
    echo("Email não encontrado");
}