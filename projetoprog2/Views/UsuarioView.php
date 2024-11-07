<?php
namespace Views;
require "..\config.php";


$login['email'] = "joao";
$login['senha'] = "123";
$usuario = $usuariosController->VerificarLogin($login);
var_dump($_SESSION);

if($usuario){
    echo("Email encontrado");
}else{
    echo("Email não encontrado");
}



?>

<form action="UsuarioAction.php" method="post">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="Senha" placeholder="Nome" required>
    <button type="submit" name="editar" class="btn btn-primary">Cadastrar-se</button>
</form>