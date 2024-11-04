<?php

require_once "Controllers/TarefaScheduler.php";
require_once "Controllers/TarefasController.php";
require_once "Controllers/CursosController.php";
require_once "Controllers/UsuariosController.php";
require_once "Storage/TarefasOnDatabase.php";
require_once "Storage/CursosOnDatabase.php";
require_once "Storage/UsuariosOnDatabase.php";

use Controllers\TarefaScheduler;
use Controllers\TarefasController;
use Controllers\CursosController;
use Controllers\UsuariosController;
use Storage\TarefasOnDatabase;
use Storage\CursosOnDatabase;
use Storage\UsuariosOnDatabase;

$method = new TarefasOnDatabase();
$scheduler = new TarefaScheduler();
$tarefasController = new TarefasController($method, $scheduler);


$method = new CursosOnDatabase();
$cursosController = new CursosController($method);

$method = new UsuariosOnDatabase();
$usuariosController = new UsuariosController($method);