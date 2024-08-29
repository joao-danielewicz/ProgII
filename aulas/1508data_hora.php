<?php
include "../templates/head.php";
include "../templates/header_nav.php";
?>

<main class="d-flex flex-grow-1 justify-content-center ">
    <div class="azul-medio p-3 rounded">
        <div class="bg-white p-3 rounded overflow-auto">
            <?php
            // define o fuso horário para ser usado com as funções date
            date_default_timezone_set('America/Sao_Paulo');

            echo "<h2>Data/Hora</h2>";
            // Y mostra o ano em extenso: 2024.
            // y mostra somente o ano sem o milênio: 24.
            echo "Hoje é dia " . date('d/m/Y') . " e agora são " . date('H:i:s') . "<br>";
            echo "Hoje é dia " . date('d/m/y') . " e agora são " . date('H:i:s') . "<br>";
            echo "Estamos no mês de: " . date('F') . "<br>";
            echo "Hora em formato de 12 horas: " . date('h:i:s A');


            // $_variavel
            // $_variavel
            // $123
            // Superglobais: são as palavras reservadas da linguagem, como _POST, _GET, _FILES, _SESSION, _COOKIE, etc...

            echo "<h2>Aritmética</h2>";
            $resultado = 10 * 20;
            echo "10 x 20 é " . $resultado . "<br>";

            $porcentagem = 1900 * 0.18;
            echo "18% de 1900 é " . $porcentagem . "<br>";

            $intervalo = date_diff(new DateTime('2024-2-28'), new DateTime('now'));

            echo $intervalo->format('Já se passaram %a dias desde 28 de fevereiro de 2024.')

            ?>

        </div>
    </div>
</main>