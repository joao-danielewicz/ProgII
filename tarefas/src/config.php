<?php
namespace Tarefas;
require "StorageOnCsv.php";
require "StorageOnDatabase.php";
require "TarefasController.php";

$method = new StorageOnCsv('tarefas.csv');
$tarefasController = new TarefasController($method);

