<?php
include "../templates/head.php";
include "../templates/header_nav.php";

function calcularAnoBissexto($ano)
{
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

function getDiasDoMes($ano, $mes)
{
    // Verifica quantos dias serão necessários distribuir no mês.
    $quantidadesDiasPorMes = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if (calcularAnoBissexto($ano)) {
        $quantidadesDiasPorMes[1] = 29;
    }
    $quantidadeDiasMes = $quantidadesDiasPorMes[$mes - 1];

    $diasDaSemana = [
        "Sun" => 1,
        "Mon" => 0,
        "Tue" => -1,
        "Wed" => -2,
        "Thu" => -3,
        "Fri" => -4,
        "Sat" => -5
    ];

    $diaSemanaComecoMes = date("D", mktime(0, 0, 0, $mes, 1, $ano));

    $diasDoMes = [];
    $dia = $diasDaSemana[$diaSemanaComecoMes];
    $aux = 1;
    while ($dia < $quantidadeDiasMes + 1) {
        array_push($diasDoMes, $dia);
        if ($aux % 7 == 0) {
            array_push($diasDoMes, null);
        }
        $aux++;
        $dia++;
    }

    array_push($diasDoMes, null);
    return $diasDoMes;
}

function criarSemanas($diasDoMes)
{
    $semanasDoMes = [];
    $semana = [];
    foreach ($diasDoMes as $dia) {
        if ($dia === null) {
            array_push($semanasDoMes, $semana);
            $semana = [];
        } else {
            array_push($semana, $dia);
        }
    }

    return $semanasDoMes;
}

function criarTableBodyCalendario($ano, $mes)
{
    foreach (criarSemanas(getDiasDoMes($ano, $mes)) as $semana) {
        echo "<tr>";
        $aux = 1;
        foreach ($semana as $dia) {
            $style = "";
            if ($dia > 0) {
                if ($aux == 1) {
                    $style .= 'background-color: rgb(255, 0,0, 50%);';
                }
                if ($dia == date('d')) {
                    $style .= 'font-weight: bold';
                }

                echo "<td style='$style'>$dia</td>";
            } else {
                echo "<td></td>";
            }
            $aux++;
        }
        echo "</tr>";
    }
}


?>

<div class="d-flex flex-column text-center mx-auto">
    <form action="calendario3.php" method="post" class="d-flex gap-3 mb-5">
        <input class="form-control" type="number" min="1" max="12" placeholder="Mês" name="mes">
        <input class="form-control" type="number" min="1" max="5000" placeholder="Ano" name="ano">
        <button class="btn btn-primary" type="submit" name="submit">Criar</button>
    </form>

    <table class="table border border-dark bg-white">
        <thead>
            <tr>
                <th style="border: 1px solid">DOM</th>
                <th style="border: 1px solid">SEG</th>
                <th style="border: 1px solid">TER</th>
                <th style="border: 1px solid">QUA</th>
                <th style="border: 1px solid">QUI</th>
                <th style="border: 1px solid">SEX</th>
                <th style="border: 1px solid">SAB</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if(!isset($_POST['mes']) && !isset($_POST['ano'])){
                    $ano = 2024;
                    $mes = 8;
                }else{
                    $ano = $_POST['ano'];
                    $mes = $_POST['mes'];;
                }
                echo "<p class='mb-0 border border-dark border-bottom-0 bg-white py-3 fs-5 fw-bold'>$mes/$ano</p>";
                criarTableBodyCalendario($ano, $mes);
            ?>
        </tbody>

    </table>
</div>