<?php
namespace Views;
// require "..\config.php";
session_start();

?>
<div class="d-flex flex-column align-self-start mt-5 mb-3 mx-auto">
    <form action="CursoAction.php" method="POST"class="d-flex flex-column bg-white p-3 rounded round mb-3">
        <h4 class="text-center mb-5">Adicionar novo curso</h4>
        <div class="d-flex flex-row gap-3 align-items-center mb-3">
            <input class="form-control" type="text" name="nome" placeholder="Nome do curso" required>
        </div>

        <div class="d-flex flex-row gap-3 align-items-center">
            <input class="form-control" type="text" name="areaConhecimento" placeholder="Área de conhecimento" required>
            <label for="qtdtarefas">Novas tarefas por dia</label>
            <input class="form-control" type="number" min="1" step="1" max="30" value="10" name="quantidadeNovasTarefas" required>
            <input class="btn btn-primary w-100" type="submit" name="adicionar">
        </div>
    </form>

    <div class="d-flex flex-column bg-white p-3 rounded round overflow-auto" style="max-height: 400px;">


        <h4 class="mb-5 text-center">Listagem de Cursos</h4>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Área de conhecimento</th>
                    <th>Tarefas novas por dia</th>
                    <th>Data de adição</th>
                    <th>Usuário</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if ($cursosController->GetCursos($_SESSION['usuario']->idUsuario) != null):
                    foreach ($cursosController->GetCursos($_SESSION['usuario']->idUsuario) as $curso):
                ?>
                        <form action="CursoAction.php" method="POST">
                            <tr>
                                <input type="hidden" name="id" value=<?= $curso->idCurso  ?>>
                                <td><input class="form-control" type="text" name="nome" value='<?= $curso->nome ?>'></td>
                                <td><input class="form-control" type="text" name="areaConhecimento" value='<?= $curso->areaConhecimento ?>'></td>
                                <td><input class="form-control" type="number" name="quantidadeNovasTarefas" value='<?= $curso->quantidadeNovasTarefas ?>'></td>
                                <td><input class="form-control" type="date" name="dataAdicao" value='<?= $curso->dataAdicao->format('Y-m-d') ?>'></td>
                                <td><input class="form-control" type="text" name="idUsuario" value='<?= $curso->idUsuario ?>'></td>
                                <td>
                                    <button type="submit" name="editar" class="btn btn-primary">Salvar alterações</button>
                                    <button type="submit" name="remover" class="btn btn-danger">Remover</button>
                                </td>
                        </form>
                        </tr>
                <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>

    </div>
</div>