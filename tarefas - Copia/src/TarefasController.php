<?php
namespace Tarefas;
require_once "Tarefa.php";

class TarefasController{
    private $method;

    public function __construct($method){
        $this->method = $method;
    }

    public function Adicionar($post){
        if(!isset($post['status'])){
            $post['status'] = 0;
        }

        $tarefa = new Tarefa(
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