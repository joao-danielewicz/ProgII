<?php
include "src/config.php";
include "../templates/head.php";
include "../templates/header_nav.php";
session_start();

?>
<div class="d-flex flex-column align-self-start mt-5 mb-3 mx-auto">
    <form action="src/TarefaAction.php" method="POST" class="d-flex flex-column bg-white p-3 rounded round mb-3">
        <h4 class="text-center mb-5">Adicionar nova tarefa</h4>
        <div class="d-flex flex-row gap-3 align-items-center mb-3">
            <input class="form-control" type="text" name="nome" placeholder="Nome da tarefa" required>
            
            
            <label>Prioridade: </label>
            <input type="radio" value='Alta' name="prioridade" required id="alta">
            <label for="alta">Alta</label>
            <input type="radio" value='Média' name="prioridade" required id="media">
            <label for="media">Média</label>
            <input type="radio" value='Baixa' name="prioridade" required id="baixa">
            <label for="baixa">Baixa</label>
            
        </div>
        
        <div class="d-flex flex-row gap-3 align-items-center">
            <input class="form-control" type="text" name="descricao" placeholder="Descrição" required>
        
            <label>Prazo</label>
            <input class="form-control" type="date" name="prazo" required>
            
            
            <label for="concluida">Completada</label>
            <input type="checkbox" name="concluida" id="concluida" value="1">
            <input class="btn btn-primary w-100" type="submit" name="adicionar">
        </div>
        
    </form>

    <div class="d-flex flex-column bg-white p-3 rounded round overflow-auto" style="max-height: 400px;">

        <h4 class="mb-5 text-center">Listagem de tarefas</h4>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Prazo</th>
                    <th>Conclusão</th>
                    <th>Prioridade</th>
                    <th>Opções</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if ($tarefasController->GetTarefas() != null):
                    foreach ($tarefasController->GetTarefas() as $tarefa):
                ?>
                        <form action="src/TarefaAction.php" method="POST">
                            <tr>
                                <input type="hidden" name="id" value=<?= $tarefa->id  ?>>
                                <td><input class="form-control" type="text" name="nome" value='<?= $tarefa->nome ?>'></td>
                                <td><input class="form-control" type="text" name="descricao" value='<?= $tarefa->descricao ?>'></td>
                                <td><input class="form-control" type="date" name="prazo" value='<?= $tarefa->prazo->format('Y-m-d') ?>'></td>
                                <td><input type="checkbox" name="concluida" value='1' <?= $tarefa->concluida  ? 'checked' : '' ?>></td>
                                <td>
                                    <?php foreach (['Alta', 'Média', 'Baixa'] as $prioridade): ?>
                                        <input type="radio" value='<?= $prioridade ?>' name="prioridade" required <?= $tarefa->prioridade == $prioridade ? 'checked' : '' ?>>
                                        <label><?= $prioridade ?></label>
                                    <?php endforeach; ?>
                                </td>
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