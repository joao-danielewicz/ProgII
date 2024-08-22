<?php
require "Models/Pessoa.php";

$pessoas = [
    "joao" => new Pessoa('João', 80, 1.74),
    "bianca" => new Pessoa('Bianca', 80, 1.78),
    "emily" => new Pessoa('Emily', 67, 1.74)
];

foreach ($pessoas as $pessoa) {
    echo($pessoa->apresentar()."\n");
}

// A função var_dump explora todos os índices do Array e retorna seu nome (ou posição), bem como o tipo e tamanho da variável.
// Como os índices são compostos por objetos, ela também irá mostrar os atributos dos mesmos.
var_dump($pessoas);
?>

