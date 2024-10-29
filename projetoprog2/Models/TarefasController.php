<?php
require_once "Tarefa.php";


class TarefasController{
    private $method;
    private $scheduler;

    public function __construct($method, $scheduler){
        $this->method = $method;
        $this->scheduler = $scheduler;
    }

    public function InsertTarefa($tarefa){
        // $tarefa = $this->scheduler->CadastroTarefa($tarefa);
        $this->method->Insert($tarefa);
    }
    
    public function GetTarefas(){
        $listaTarefas = $this->method->SelectAllTarefas();
        $buildTarefas = [];
        if($listaTarefas != null){
            foreach($listaTarefas as $tarefa){
                if(empty($tarefa['midia'])){
                    $tarefa['midia'] = "";
                }
                $buildTarefas[] = new Tarefa(
                    $tarefa['assunto'], $tarefa['pergunta'], 
                    new DateTime($tarefa['dataAdicao']),
                    new DateTime($tarefa['dataProximoEstudo']),
                    new DateTime($tarefa['dataUltimoEstudo']),
                    $tarefa['nivelEstudo'],
                    $tarefa['midia'], $tarefa['nivelEstudo'], $tarefa['id']
                );
            }
            return $buildTarefas;
        }
        return null;
    }
    
    public function UpdateTarefa($post){
        return $this->method->Update($post);
    }

    public function DeleteTarefa($post){
        return $this->method->Delete($post);
    }
}