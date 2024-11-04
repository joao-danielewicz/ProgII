<?php
namespace Views;
require "..\config.php";


$login['email'] = "joao@joao.com";
$login['senha'] = "ASDFghj89!";
$usuario = $usuariosController->VerificarLogin($login);
var_dump($_SESSION);

if($usuario){
    echo("Email encontrado");
}else{
    echo("Email não encontrado");
}



?>

<form action="UsuarioAction.php" method="post">
    <input type="text">
</form>