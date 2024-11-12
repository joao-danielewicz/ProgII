<?php
if(!is_string($msg)){
    $msg = '';
}
?>
<p><?php echo $msg ?></p>
<form action="loginuser" method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Nome" required>
    <button type="submit" class="btn btn-primary">Cadastrar-se</button>
</form>