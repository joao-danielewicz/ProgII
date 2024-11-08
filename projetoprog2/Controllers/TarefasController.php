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
        $tarefa = $this->scheduler->CadastroTarefa($tarefa);
        $this->method->Insert($tarefa);
    }
    
    private function BuildTarefas($listaTarefas){
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
                    $tarefa['idTarefa'], $tarefa['assunto'], $tarefa['pergunta'], $tarefa['resposta'],
                    $tarefa['midiaPergunta'], $tarefa['midiaResposta'],
                    new DateTime($tarefa['dataAdicao']),
                    new DateTime($tarefa['dataProximoEstudo']),
                    new DateTime($tarefa['dataUltimoEstudo']),
                    $tarefa['nivelEstudo'],
                    $tarefa['idCurso']
                );
            }
            return $buildTarefas;
        }
        return null;
    }
    public function GetTarefas($idCurso){
        $listaTarefas = $this->method->SelectAllTarefas($idCurso);
        return $this->BuildTarefas($listaTarefas);
    }
    
    public function GetTarefasByDate($idCurso, $data){
        $listaTarefas = $this->method->SelectTarefasByDate($idCurso, $data);
        return $this->BuildTarefas($listaTarefas);
    }

    public function GetNovasTarefas($idCurso){
        $listaTarefas = $this->method->SelectNovasTarefas($idCurso);
        return $this->BuildTarefas($listaTarefas);
    }
    
    public function UpdateTarefa($post){
        return $this->method->Update($post);
    }

    public function DeleteTarefa($post){
        return $this->method->Delete($post);
    }

    public function EstudarTarefa($post){
        $tarefa = $this->scheduler->Estudar($post);
        return $this->UpdateTarefa($tarefa);
    }
}