<?php
namespace Tarefas;
require_once "TarefasController.php";
require_once "TarefasOnMemory.php";


$method = new TarefasOnMemory();
$tarefasController = new TarefasController($method);

$post = [
    'nome'=>'joao',
    'datafinal' => '2024-9-16',
    'prioridade' => 'alta'
];

$tarefasController -> Adicionar($post);
var_dump($tarefasController->GetTarefas());