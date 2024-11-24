<?php
require_once("Views/shared/layout/header.php");
?>

<link rel="stylesheet" href="/Views/Usuarios/css/perfil.css">

<div class="container mt-5">


    <div class="d-flex align-items-center">
        <div class="bg-white shadow rounded round p-3 me-3">
            <?php if (!empty($usuario->fotoPerfil)): ?>
                <div id="fotoPerfil" class="rounded-circle">

                    <img class="rounded-circle" src="data:image/*; base64,<?= base64_encode($usuario->fotoPerfil) ?>" />
                </div>
            <?php endif; ?>

            <div class="mt-3">
                <p class="m-0"><?php echo ($usuario->nome) ?></p>
                <p class="m-0"><?php echo ($usuario->email) ?></p>
                <p class="m-0"><?php echo ($usuario->telefone) ?></p>
            </div>
        </div>
        <div id="galeria" class="text-center bg-white shadow rounded round p-3 flex-grow-1">
            <h2>Galeria</h2>


            <?php if (!empty($galeria)): foreach ($galeria as $item): ?>
                    <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1">
                        <div class="col">
                            <!-- <img src="data:image/*; base64,<?= base64_encode($item['midia']) ?>"/> -->
                        </div>
                    </div>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</div>