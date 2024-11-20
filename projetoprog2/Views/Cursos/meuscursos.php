<?php
require_once "Views/shared/layout/header.php";

if (!is_string($msg)) {
    $msg = '';
}
?>


<!-- Cria um título para a página -->
<title><?php echo($titulo)?></title>

<!-- Verifica se há alguma mensagem a ser passada ao usuário. Caso positivo, escreve-a. -->
<?php if(!empty($msg)):?>
    <div class="position-absolute border border-danger rounded round m-3 bg-white p-3 shadow">
        <p class="m-0"><?php echo $msg ?></p>
    </div>
<?php endif; ?>


<div class="container mt-5">
    <div class="">
        <!-- <form action="cadcurso" method="POST"class="d-flex flex-column bg-white p-3 rounded round mb-3">
            <h4 class="text-center mb-5">Adicionar novo curso</h4>
            <div class="d-flex flex-row gap-3 align-items-center mb-3">
                <input class="form-control" type="text" name="nome" placeholder="Nome do curso" required>
                <input class="form-control" type="text" name="areaConhecimento" placeholder="Área de conhecimento" required>
            </div>
            
            <div class="d-flex flex-row gap-3 align-items-center">
                <label for="qtdtarefas">Novas tarefas por dia</label>
                <input class="form-control" type="number" min="1" step="1" max="30" value="10" name="quantidadeNovasTarefas" required>
                <input class="btn btn-primary w-100" type="submit" name="adicionar">
            </div>
        </form> -->

        <div class="d-flex flex-column bg-white p-3 rounded round text-center shadow mb-3">
            <h3>Meus cursos</h3>
            <hr>
            <p class="m-0">Veja abaixo todos os cursos que pertencem a você.</p>
        </div>

        <?php if ($cursos): ?>
            <?php foreach ($cursos as $curso): ?>
                <div class="d-flex flex-column bg-white rounded round shadow">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo ($curso->idCurso) ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    <?php echo ($curso->nome) ?>
                                </button>
                            </h2>
                            <div id="<?php echo ($curso->idCurso) ?>" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <table class="table">

                                        <thead>
                                            <th>Nome</th>
                                            <th>Assunto</th>
                                            <th>Tarefas novas por dia</th>
                                            <th>Opções</th>
                                        </thead>
                                        <form action="updatecurso" method="post">
                                            <input type="hidden" name="idCurso" value=<?= $curso->idCurso  ?> readonly>
                                            <tbody>
                                                <td><input class="form-control" type="text" name="nome" value='<?= $curso->nome ?>'></td>
                                                <td><input class="form-control" type="text" name="areaConhecimento" value='<?= $curso->areaConhecimento ?>'></td>
                                                <td><input class="form-control" type="number" name="quantidadeNovasTarefas" value='<?= $curso->quantidadeNovasTarefas ?>'></td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                                                    <button type="submit" formaction="/deletecurso" class="btn btn-danger">Remover</button>
                                                </td>
                                            </tbody>
                                        </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>

<?php require_once "Views/shared/layout/footer.php" ?>