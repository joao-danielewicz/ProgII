<?php
namespace Tarefas;
require_once "Tarefa.php";

class TarefasController{
    private $method;

    public function __construct($method){
        $this->method = $method;
    }

    public function Adicionar($tarefa){
        $this->method->Insert($tarefa);
    }
    
    public function GetTarefas(){
        return $this->method->SelectAllTarefas();
    }
}