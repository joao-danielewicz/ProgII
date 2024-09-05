<?php
namespace Tarefas;
require_once "src/Tarefa.php";
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
            <input type="text" name="prioridade" placeholder="Prioridade">

            <label>Terminar até: </label>
            <input type="date" name="datafinal">


            <label for="status">Tarefa completada</label>
            <input type="checkbox" name="status" id="status">
            <input type="submit" name="gravar">
        </fieldset>
    </form>

    <h4>Listagem de tarefas</h4>
    <table border='1px solid'>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data</th>
                <th>Status</th>
                <th>Prioridade</th>
            </tr>
        </thead>

        <?php 
            foreach ($_SESSION['lista_tarefas'] as $linha): 
                $tarefa = new Tarefa($linha[0], $linha[1], $linha[2], $linha[3], $linha[4]);
        ?>

            <tr>
                <td style='padding: 10px'><?php echo $tarefa->nome; ?></td>
                <td style='padding: 10px'><?php echo $tarefa->datafinal->format("Y-m-d"); ?></td>
                <td style='padding: 10px'><?php echo $tarefa->status; ?></td>
                <td style='padding: 10px'><?php echo $tarefa->prioridade; ?></td>
            </tr>

        <?php endforeach ?>
    </table>



</body>

</html>

