<?php

function getDiasDoMes($quantidadeDiasMes){    
    $mes = [];
    $dia = 1;
    while($dia<$quantidadeDiasMes){
        array_push($mes, $dia);
        if($dia % 7 == 0){
            array_push($mes, null);
        }
        $dia++;
    }
}

$ano = 1701;
$i = 0;
$mesComecoDomingo = new DateTime('1700-1-1');
$linha = "";
$padrao = [];
while($ano<2300){
    for($mes=0; $mes<12; $mes++){
        $diaSemanaComecoMes = date("D", mktime(0,0,0, $mes, 1, $ano));
        if($diaSemanaComecoMes == "Sun"){
            $mesComecoDomingo = new DateTime("{$ano}-{$mes}-1");
        }
        $intervalo = (date_diff($mesComecoDomingo, new DateTime("{$ano}-{$mes}-1")))->format('%m')+1;
        if($intervalo == 1){
            echo($linha);
            array_push($padrao, $linha);
            $linha = "";
        }
        $linha .= $intervalo;
    }
    $ano++;
}
$i = 1;
foreach ($padrao as $linha) {
    if($i>=214){
        echo "<p>$i - $linha</p>";
    }
    if(($i-214)%51==0){
        echo "<p>PADRAO</p>";
    }
    $i++;
}