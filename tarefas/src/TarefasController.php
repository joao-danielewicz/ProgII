<?php
namespace Tarefas;
require_once "Tarefa.php";

class TarefasController{
    private $method;

    public function __construct($method){
        $this->method = $method;
    }

    public function Adicionar($post){
        $this->method->Insert($post);
    }
    
    public function GetTarefas(){
        return $this->method->SelectAllTarefas();
    }
}