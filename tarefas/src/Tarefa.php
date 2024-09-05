<?php
namespace Tarefas;
use DateTime;

class Tarefa{
    public int $id;
    public string $nome;
    public string $prioridade;
    public DateTime $datafinal;
    public bool $status;

    public function __construct(int $id, string $nome, string $prioridade, string $datafinal, bool $status){
        $this->id=$id;
        $this->nome=$nome;
        $this->prioridade=$prioridade;
        $this->datafinal = new DateTime($datafinal);
        $this->status=$status;
    }

    public function toArray(){
        $tarefa = [
            "id" => $this->id,
            "nome" => $this->nome,
            "prioridade" => $this->prioridade,
            "datafinal" => $this->datafinal->format("Y-m-d"),
            "status" => $this->status,
        ];
        return $tarefa;
    }
}