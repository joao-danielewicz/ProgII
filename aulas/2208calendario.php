<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
</head>

<body>
    <h3 class="text-center mb-3">Calendário</h3>
    <form action="index.php" method="post" class="mb-3 d-flex gap-3">
        <input class="form-control" type="number" min="1" max="12" name="mes" placeholder="Mês">
        <input class="form-control" type="number" min="1" max="2500"  name="ano" placeholder="Ano">
        <button type="submit" name="criarcalendario" class="btn btn-primary">Criar</button>
    </form>

    <?php
        // Verificar se o usuário escolheu algum mês e ano específicos no Formulário.
        // Se não houver nenhum, usa como padrão a data em que a atividade foi realizada (8/2024).
        if(isset($_POST['mes'])){
            $mes = $_POST['mes'];
        }else{
            $mes = 8;
        }
        
        if(isset($_POST['ano'])){
            $ano = $_POST['ano'];
        }else{
            $ano = 2024;
        }

        // Verifica se o ano escolhido é bissexto para, posteriormente, adicionar um dia ao mês de fevereiro.
        function calcularAnoBissexto($ano) {
            if ($ano % 4 == 0) {
                if (($ano % 100 == 0) && ($ano % 400 != 0)) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }

        // Escreve o calendário de acordo com o mês e ano escolhidos.
        function populaCalendario($mes, $ano){
            echo "<p>".$mes.'/'.$ano."</p>";

            // Descobre em qual dia da semana o mês começou.
            $diaSemanaComecoMes = date("D", mktime(0,0,0, $mes, 1, $ano));
            $nomesDiasSemana = [
                "Sun",
                "Mon",
                "Tue",
                "Wed",
                "Thu",
                "Fri",
                "Sat"
            ];
        
            // Verifica quantos dias serão necessários distribuir no mês.
            $quantidadesDias = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            if(calcularAnoBissexto($ano)){
                $quantidadesDias[1] = 29;
            }
            $quantidadeDiasMes = $quantidadesDias[$mes-1];

            // Como descobre-se primeiro o nome do dia da semana, passamos por eles sem escrever nada.
            // O primeiro loop preencherá os dias anteriores ao dia primeiro com células vazias.
            // Assim que o primeiro dia for posicionado corretamente, o dia da semana se tornará irrelevante para a disposição dos numerais.
            echo "<tr>";
            $dia = 1;
            $aux = 1;
            foreach($nomesDiasSemana as $nome){
                if($diaSemanaComecoMes == $nome){
                    if($nome=="Sun"){
                        echo "<td style='background-color: rgb(255, 0, 0, 50%)'>$dia</td>";
                    }else{
                        echo "<td>$dia</td>";
                    }
                    $dia++;
                    break;
                }else{
                    echo "<td></td>";
                }
                $aux++;
            }
            
            // Preenche todos os dias a partir do primeiro até o limite do mês.
            // O auxiliar é usado para contar as células, já que deve-se iniciar uma nova linha da tabela a cada 7 células.
            for($dia; $dia<$quantidadeDiasMes+1; $dia++){
                if($aux%7==0){
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td style='background-color: rgb(255, 0, 0, 50%)'>$dia</td>";
                }else if($dia == date('j')){
                    echo "<td style='font-weight: bold'>$dia</td>";
                }else{
                    echo "<td>$dia</td>";
                }
                $aux++;
            }
            echo "</tr>";
        }
    ?>
    
    <div class="d-flex flex-column text-center">

        <table class="table">
            <thead>
                <tr>
                    <th>DOM</th>
                    <th>SEG</th>
                    <th>TER</th>
                    <th>QUA</th>
                    <th>QUI</th>
                    <th>SEX</th>
                    <th>SAB</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                echo populaCalendario(8, 2024);
                ?>
        </tbody>
        
    </table>
    </div>
    
    
</body>

</html>