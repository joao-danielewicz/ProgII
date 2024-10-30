<?php
namespace Storage;

function pegarImagem(Array $files):string{
    $nome_img = $files['midia']['name'];
    $tipo_img = $files['midia']['type'];
    $tam_img = $files['midia']['size'];
    $midia = $files['midia']['tmp_name'];

    $fp = fopen($midia, "rb");
    $midia = fread($fp, $tam_img);
    $midia = addslashes($midia);
    fclose($fp);

    return $midia;
}