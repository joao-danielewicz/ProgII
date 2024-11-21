<?php
require_once "Views/shared/layout/header.php";
?>
<link rel="stylesheet" href="Views/Tarefas/css/tarefas.css">

<div class="container">

    <div id="cards" class="bg-white rounded round text-center shadow mb-3 mt-5 align-content-center">
        <div id="carouselExample" class="carousel slide " data-bs-theme="dark">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    começo
                </div>

                <?php foreach($tarefas as $tarefa):?>
                <div class="carousel-item">
                    <img src="data:image/*; base64,<?= base64_encode($tarefa->midiaPergunta) ?>" />
                </div>
                <?php endforeach; ?>
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
    </div>
</div>
    

<?php
require_once "Views/shared/layout/footer.php";
?>