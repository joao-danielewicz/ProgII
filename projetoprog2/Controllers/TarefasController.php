<?php
namespace Controllers;
use Models\Tarefa;
use DateTime;



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
                if(empty($tarefa['midiaPergunta'])){
                    $tarefa['midiaPergunta'] = "";
                }
                if(empty($tarefa['midiaResposta'])){
                    $tarefa['midiaResposta'] = "";
                }
                
                $buildTarefas[] = new Tarefa(
                    $tarefa['id'], $tarefa['assunto'], $tarefa['pergunta'], $tarefa['resposta'],
                    $tarefa['midiaPergunta'], $tarefa['midiaResposta'],
                    new DateTime($tarefa['dataAdicao']),
                    new DateTime($tarefa['dataProximoEstudo']),
                    new DateTime($tarefa['dataUltimoEstudo']),
                    $tarefa['nivelEstudo'],
                    $tarefa['nivelEstudo']
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