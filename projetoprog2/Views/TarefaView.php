<?php
namespace Views;
require "..\config.php";

?>
<div class="d-flex flex-column align-self-start mt-5 mb-3 mx-auto">
    <form action="TarefaAction.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column bg-white p-3 rounded round mb-3">
        <h4 class="text-center mb-5">Adicionar nova tarefa</h4>
        <div class="d-flex flex-row gap-3 align-items-center mb-3">
            <input class="form-control" type="text" name="assunto" placeholder="Nome da tarefa" required>
        </div>

        <div class="d-flex flex-row gap-3 align-items-center">
            <input class="form-control" type="text" name="pergunta" placeholder="Descrição" required>
            <input class="form-control" type="text" name="resposta" placeholder="Descrição" required>
            <input class="form-control" type="file" accept="image/*" name="midiaPergunta" placeholder="Imagem">
            <input class="form-control" type="file" accept="image/*" name="midiaResposta" placeholder="Imagem">
            <input class="btn btn-primary w-100" type="submit" name="adicionar">
        </div>
    </form>

    <div class="d-flex flex-column bg-white p-3 rounded round overflow-auto" style="max-height: 400px;">


        <h4 class="mb-5 text-center">Listagem de tarefas</h4>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Assunto</th>
                    <th>Pergunta</th>
                    <th>Resposta</th>
                    <th>Data de adição</th>
                    <th>Último estudo</th>
                    <th>Próximo estudo</th>
                    <th>Nível de masterização</th>
                    <th>Curso</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if ($tarefasController->GetTarefas() != null):
                    foreach ($tarefasController->GetTarefas() as $tarefa):
                ?>
                        <form action="TarefaAction.php" method="POST">
                            <tr>
                                <input type="hidden" name="id" value=<?= $tarefa->idTarefa  ?>>
                                <td><input class="form-control" type="text" name="assunto" value='<?= $tarefa->assunto ?>'></td>
                                <td><input class="form-control" type="text" name="pergunta" value='<?= $tarefa->pergunta ?>'></td>
                                <td><input class="form-control" type="text" name="pergunta" value='<?= $tarefa->resposta ?>'></td>
                                <td><input class="form-control" type="date" name="dataAdicao" value='<?= $tarefa->dataAdicao->format('Y-m-d') ?>'></td>
                                <td><input class="form-control" type="date" name="dataUltimoEstudo" value='<?= $tarefa->dataUltimoEstudo->format('Y-m-d') ?>'></td>
                                <td><input class="form-control" type="date" name="dataProximoEstudo" value='<?= $tarefa->dataProximoEstudo->format('Y-m-d') ?>'></td>
                                <td><input class="form-control" type="text" name="nivelEstudo" value='<?= $tarefa->nivelEstudo ?>'></td>
                                <td><input class="form-control" type="text" name="idCurso" value='<?= $tarefa->idCurso ?>'></td>
                                <td><img src="data:image/png; base64, <?= base64_encode($tarefa->midiaPergunta) ?>"/> </td>
                                <td><img src="data:image/png; base64, <?= base64_encode($tarefa->midiaResposta) ?>"/> </td>
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