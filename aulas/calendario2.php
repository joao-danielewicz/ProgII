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
    function linha($semana)
    {
        $organizacaoDias = [
            "Mon",
            "Tue",
            "Wed",
            "Thu",
            "Fri",
            "Sat",
            "Sun"
        ];
        $linha = "<tr>";
        
        $diaComecoMes = date("D", mktime(0,0,0, 8, 1, 2024));
        
        for($i=0; $i<7; $i++){
            if($organizacaoDias[$i]==$diaComecoMes){
                $diaComecoMes = $i;
            }
        }
        for($i = 0; $i < 7; $i++){
            if((array_key_exists($i, $semana))){
                if($i == 6){
                    $linha .= "<td style='background-color: rgb(255, 0 ,0)'>{$semana[$i]}</td>";
                }else{
                    $linha .= "<td>{$semana[$i]}</td>";
                }
            }else{
                $linha .= "<td></td>";
            }
        }
        
        $linha .= "</tr>";
        return $linha;
    }
    
    function populaCalendario(){
        $calendario = '';
        $dia = 1;
        $semana = [];
        
        while($dia <= 31){
            array_push($semana, $dia);
            
            if(count($semana)==7){
                $calendario .= linha($semana);
                $semana = [];
            }
            $dia++;
        }
        
        $calendario .= linha($semana);
        return $calendario;
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
                echo populaCalendario();
                
                ?>
        </tbody>
        
    </table>


</body>

</html>