<?php
namespace Tarefas;
require_once "Tarefa.php";

class TarefasController{
    private $method;
    private $id;

    public function __construct($method){
        $this->method = $method;
        $this->id = 0;
    }

    public function Adicionar($post){
        if(!isset($post['status'])){
            $post['status'] = 0;
        }
        $this->id++;

        $tarefa = new Tarefa(
            $this->id,
            $post['nome'],
            $post['prioridade'],
            $post['datafinal'],
            $post['status']
        );

        $this->method->Insert($tarefa);
    }
    
    public function GetTarefas(){
        return $this->method->RetrieveAll();
    }
}