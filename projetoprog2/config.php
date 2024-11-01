<?php
require_once "Controllers/TarefaScheduler.php";
require_once "Controllers/TarefasController.php";
require_once "Controllers/CursosController.php";
require_once "Storage/TarefasOnDatabase.php";
require_once "Storage/CursosOnDatabase.php";

use Controllers\TarefaScheduler;
use Controllers\TarefasController;
use Controllers\CursosController;
use Storage\TarefasOnDatabase;
use Storage\CursosOnDatabase;

$method = new TarefasOnDatabase();
$scheduler = new TarefaScheduler();
$tarefasController = new TarefasController($method, $scheduler);


$method = new CursosOnDatabase();
$cursosController = new CursosController($method);