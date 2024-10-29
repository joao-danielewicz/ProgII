<?php

class Tarefa{
    public int $id;
    public string $assunto;
    public string $pergunta;
    public string $midia;
    public DateTime $dataAdicao;
    public DateTime $dataProximoEstudo;
    public DateTime $dataUltimoEstudo;
    public int $nivelEstudo;
    public int $idCurso;

    public function __construct(string $assunto, string $pergunta,
                                DateTime $dataAdicao,
                                DateTime $dataProximoEstudo,
                                DateTime $dataUltimoEstudo,
                                int $idCurso,
                                string $midia, int $nivelEstudo, int $id){
        $this->id=$id;
        $this->assunto=$assunto;
        $this->pergunta=$pergunta;
        $this->nivelEstudo=$nivelEstudo;
        $this->dataAdicao=$dataAdicao;
        $this->dataUltimoEstudo=$dataUltimoEstudo;
        $this->dataProximoEstudo=$dataProximoEstudo;
        $this->midia=$midia;
        $this->idCurso=$idCurso;
    }
}