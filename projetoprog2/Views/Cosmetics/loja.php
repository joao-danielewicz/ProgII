<?php

var_dump($itens);

?>

<form action="caditem" method="POST" enctype="multipart/form-data">
    <input type="text" name="descricao">
    <input type="text" name="tipo">
    <input type="file" accepts="image/*" name="midia">
    <input type="submit">
</form>