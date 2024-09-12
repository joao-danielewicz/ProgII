<?php
namespace Tarefas;
require_once "Tarefa.php";

class TarefasController{
    private $method;

    public function __construct($method){
        $this->method = $method;
    }

    public function InsertTarefa($post){
        $post['concluida'] = isset($post['concluida']) ? 1 : 0;
        $this->method->Insert($post);
    }
    
    public function GetTarefas(){
        $listaTarefas = $this->method->SelectAllTarefas();
        $buildTarefas = [];
        if($listaTarefas != null){
            foreach($listaTarefas as $tarefa){
                $buildTarefas[] = new Tarefa($tarefa['id'], $tarefa['nome'], $tarefa['descricao'], $tarefa['prioridade'], $tarefa['prazo'], $tarefa['concluida']);
            }
            return $buildTarefas;
        }
        return null;
    }
    
    public function UpdateTarefa($post){
        $post['concluida'] = isset($post['concluida']) ? 1 : 0;
        return $this->method->Update($post);
    }

    public function DeleteTarefa($post){
        return $this->method->Delete($post);
    }
}