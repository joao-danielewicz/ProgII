<?php
namespace Tarefas;

class TarefasOnMemory{
    private $tarefas;

    public function __construct(){
        $this->tarefas = [];
    }

    public function Insert(Tarefa $tarefa){
        array_push($this->tarefas, $tarefa);
    }

    public function RetrieveAll(){
        return $this->tarefas;
    }
}