<?php
require_once "Views/shared/layout/header.php";
?>
<link rel="stylesheet" href="Views/Tarefas/css/tarefas.css">

<title><?php echo($titulo)?></title>
<div class="container">

    <div id="cards" class="bg-white rounded round text-center shadow mb-3 mt-5 align-content-center">
        <?php if($tarefas==null):?>
            <p>Você terminou seus estudos de hoje! Parabéns!</p>
        <?php else:?>
        <div id="carouselExample" class="carousel slide " data-bs-theme="dark">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h4 class="mb-5">Início</h4>
                    <p>Você iniciará os estudos para o dia de hoje.<br>
                        Ao responder uma pergunta, indique com honestidade a dificuldade que teve ao lembrar da resposta.</p>
                    <hr class="mx-5">
                    <p>Ao final, clique no botão "salvar" para registrar sua sessão de estudos. <br>
                        Bom aprendizado!</p>
                </div>

                <?php foreach ($tarefas as $tarefa): ?>
                    <div class="carousel-item">
                        <!-- <img src="data:image/*; base64,<?= base64_encode($tarefa->midiaPergunta) ?>" /> -->

                        <button onclick="changeDificuldade('facil', '<?php echo ($tarefa->idTarefa) ?>')" id="facil" type="button" class="btn btn-success">Fácil</button>
                        <button onclick="changeDificuldade('dificil', '<?php echo ($tarefa->idTarefa) ?>')" id="dificil" type="button" class="btn btn-light">Difícil</button>
                    </div>
                <?php endforeach; ?>

                <div class="carousel-item">
                    fim
                    <form method="POST" action="estudartarefa">
                        <?php foreach ($tarefas as $tarefa): ?>
                            <div>
                                <input name="tarefa<?php echo ($tarefa->idTarefa) ?>" type="number" value="<?php echo ($tarefa->idTarefa) ?>">
                                <input name="dificuldade<?php echo ($tarefa->idTarefa) ?>" id="<?php echo ($tarefa->idTarefa) ?>" type="text" value="">
                                <input name="idCurso<?php echo ($tarefa->idTarefa) ?>" type="number" value="<?php echo ($tarefa->idCurso) ?>">
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-light">Finalizar</button>
                    </form>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <?php endif?>
    </div>
</div>

<script>
    function changeDificuldade(texto, id) {
        document.getElementById(id).value = texto;
    }
</script>

<?php
require_once "Views/shared/layout/footer.php";
?>