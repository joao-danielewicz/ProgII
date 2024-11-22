<?php
// Solicita as tags de cabeça do HTML
require_once "shared/layout/head.php";

if (!is_string($msg)) {
    $msg = '';
}
?>

<!-- Importa os estilos da página de cadastro -->
<link rel="stylesheet" href="/Views/shared/src/css/pagcaduser.css">

<!-- Verifica se há alguma mensagem de retorno. Caso positivo, escreve-a. -->
<?php if(!empty($msg)):?>
    <div class="position-absolute border border-danger rounded round m-3 bg-white p-3 shadow">
        <p class="m-0"><?php echo $msg ?></p>
    </div>
<?php endif; ?>

<div class="container w-50">
    <div class="border round rounded p-4 pb-5 bg-white shadow mt-3">
        <h2 class="text-center">Cadastre-se</h2>
        <form action="/caduser" method="post">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input class="form-control" type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input class="form-control" type="tel" id="telefone" name="telefone" required>
            </div>

            <div class="form-group">
                <label for="data-nascimento">Data de Nascimento</label>
                <input class="form-control" type="date" id="data-nascimento" name="dataNascimento" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input class="form-control" type="password" id="senha" name="senha" required>
            </div>

            <button class="btn w-100" type="submit">Cadastrar</button>
        </form>
    </div>
</div>