<?php
namespace Tarefas;
use DateTime;

class Tarefa{
    public int $id;
    public string $nome;
    public string $descricao;
    public string $prioridade;
    public DateTime $prazo;
    public bool $concluida;

    public function __construct(int $id, string $nome, string $descricao, string $prioridade, string $prazo, bool $concluida){
        $this->id=$id;
        $this->nome=$nome;
        $this->descricao=$descricao;
        $this->prioridade=$prioridade;
        $this->prazo = new DateTime($prazo);
        $this->concluida=$concluida;
    }
}