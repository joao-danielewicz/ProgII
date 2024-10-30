<?php
require_once "Controllers/TarefaScheduler.php";
require_once "Controllers/TarefasController.php";
require_once "Storage/TarefasOnDatabase.php";

use Controllers\TarefaScheduler;
use Controllers\TarefasController;
use Storage\TarefasOnDatabase;

$method = new TarefasOnDatabase();
$scheduler = new TarefaScheduler();
$tarefasController = new TarefasController($method, $scheduler);