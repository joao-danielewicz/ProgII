<?php
if(!isset($msg)){
    $msg = '';
}
?>

<form action="loginuser" method="post">
    <!-- <input type="text" name="nome" placeholder="Nome" required> -->
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Nome" required>
    <button type="submit" class="btn btn-primary">Cadastrar-se</button>
</form>