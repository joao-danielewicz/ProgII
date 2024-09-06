<?php
namespace Tarefas;
use DateTime;

class Tarefa{
    public string $nome;
    public string $prioridade;
    public DateTime $datafinal;
    public bool $status;

    public function __construct(string $nome, string $prioridade, string $datafinal, bool $status){
        $this->nome=$nome;
        $this->prioridade=$prioridade;
        $this->datafinal = new DateTime($datafinal);
        $this->status=$status;
    }

    public function toArray(){
        $tarefa = [
            "nome" => $this->nome,
            "prioridade" => $this->prioridade,
            "datafinal" => $this->datafinal->format("Y-m-d"),
            "status" => $this->status,
        ];
        return $tarefa;
    }
}