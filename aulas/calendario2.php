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
    <h3>Calendário</h3>
    <form action="calendario2.php" method="post">
        <input type="number" min="1" max="12" name="mes" placeholder="Mês">
        <input type="number" min="1" max="2500"  name="ano" placeholder="Ano">
        <button type="submit">Criar</button>
    </form>
    <?php
        function populaCalendario(){
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
        
            $quantidadesDias = [
                31,
                28,
                31,
                30,
                31,
                30,
                31,
                31,
                30,
                31,
                30,
                31
            ];

            $quantidadeDiasMes = $quantidadesDias[$mes-1];


            echo "<tr>";
            $dia = 1;
            $i = 1;
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
                $i++;
            }
            
            for($dia=$dia; $dia<$quantidadeDiasMes+1; $dia++){
                if($i%7==0){
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td style='background-color: rgb(255, 0, 0, 50%)'>$dia</td>";
                }else {
                    echo "<td>$dia</td>";
                }               
                $i++;
            }
            echo "</tr>";
        }
    ?>
    

    <table border="1">
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
                echo populaCalendario();
            ?>
        </tbody>

    </table>


</body>

</html>