<?php
require "TarefasOnDatabase.php";
require "TarefasController.php";
require "TarefaScheduler.php";

$path = $_SERVER['DOCUMENT_ROOT'].'\\tarefas\\src';

$method = new TarefasOnDatabase();
$scheduler = new TarefaScheduler();
$tarefasController = new TarefasController($method, $scheduler);

