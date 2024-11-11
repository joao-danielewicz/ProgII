<?php
namespace Views;

?>
<h1><?php echo $title?></h1>
<form action="UsuarioAction.php" method="post">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="Senha" placeholder="Nome" required>
    <button type="submit" name="editar" class="btn btn-primary">Cadastrar-se</button>
</form>