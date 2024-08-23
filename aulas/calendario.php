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

    <!-- cria função para linhas -->
    <?php
        function linha(){

        }
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>SEG</th>
                <th>TER</th>
                <th>QUA</th>
                <th>QUI</th>
                <th>SEX</th>
                <th>SAB</th>
                <th>DOM</th>
            </tr>
        </thead>
    
        <tbody>
            <?php
                $dia = 1;
                for($semana = 0; $semana<5;  $semana++){
                    echo "<tr>";
                    for($dia=$dia; $dia<32; $dia++){
                        if($dia%7==0){
                            echo "<td>".$dia."</td>";
                            $dia++;
                            break;
                        }else{
                            echo "<td>".$dia."</td>";
                        }
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    
</body>
</html>