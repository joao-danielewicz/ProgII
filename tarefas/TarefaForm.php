<?php
include "src/config.php";
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
</head>

<body>
    <h1>Gerenciador de Tarefas PHP</h1>
    <form action="src/TarefaAction.php" method="POST">
        <fieldset>
            <legend>Nova tarefa</legend>

            <input type="text" name="nome" placeholder="Nome da tarefa" required>


            <label>Prioridade: </label>
            <input type="radio" value='Alta' name="prioridade" required id="alta">
            <label for="alta">Alta</label>
            <input type="radio" value='Média' name="prioridade" required id="media">
            <label for="media">Média</label>
            <input type="radio" value='Baixa' name="prioridade" required id="baixa">
            <label for="baixa">Baixa</label>

            <input type="text" name="descricao" placeholder="Descricao" required>

            <label>Terminar até: </label>
            <input type="date" name="prazo" required>


            <label for="concluida">Tarefa completada</label>
            <input type="checkbox" name="concluida" value="1">
            <input type="submit" name="gravar">
        </fieldset>
    </form>

    <h4>Listagem de tarefas</h4>
    <table border='1px solid'>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Prazo</th>
                <th>Conclusão</th>
                <th>Prioridade</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($tarefasController->GetTarefas() != null):
                foreach ($tarefasController->GetTarefas() as $tarefa):
            ?>
                    <form action="">
                        <tr>
                            <input type="hidden" value=<?= $tarefa->id  ?>>
                            <td><input type="text" value='<?= $tarefa->nome ?>'></td>
                            <td><input type="text" value='<?= $tarefa->descricao ?>'></td>
                            <td><input type="date" value='<?= $tarefa->prazo->format('Y-m-d') ?>'></td>
                            <td><input type="checkbox" value='1' <?= $tarefa->concluida  ? 'checked' : '' ?>></td>
                            <td>
                                <?php foreach (['Alta', 'Média', 'Baixa'] as $prioridade): ?>
                                    <input type="radio" value='<?= $prioridade ?>' name="prioridade" required <?= $tarefa->prioridade == $prioridade ? 'checked' : '' ?>>
                                    <label><?= $prioridade ?></label>
                                <?php endforeach; ?>
                            </td>
                    </form>
                    </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
</body>

</html>