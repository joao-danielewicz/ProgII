<?php
namespace Tarefas;
require "StorageOnCsv.php";
require "StorageOnDatabase.php";
require "TarefasController.php";

$path = $_SERVER['DOCUMENT_ROOT'].'\\tarefas\\src';
$method = new StorageOnCsv($path."\\tarefas.csv");
$method = new StorageOnDatabase();

$tarefasController = new TarefasController($method);

