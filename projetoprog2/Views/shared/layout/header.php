<?php require_once "head.php" ?>

<header class="py-3 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <div id="titulo">
            RecapPro
        </div>
        <div id="opcoes">
            <?php if(empty($_COOKIE)):?>
                <a class="pe-3 border-end" href="/login">Entrar</a>
                <a class="ps-3"href="/cadastro">Crie sua conta</a>
            <?php else: ?>
                <a class="ps-3"href="/meuscursos">Meus cursos</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<body>