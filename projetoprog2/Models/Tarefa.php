<?php
namespace Models;
use DateTime;

class Tarefa{
    public int $id;
    public string $assunto;
    public string $pergunta;
    public string $resposta;
    public string $midiaPergunta;
    public string $midiaResposta;
    public DateTime $dataAdicao;
    public DateTime $dataProximoEstudo;
    public DateTime $dataUltimoEstudo;
    public int $nivelEstudo;
    public int $idCurso;

    public function __construct(int $id, string $assunto, string $pergunta, string $resposta, string $midiaPergunta, string $midiaResposta,
                                DateTime $dataAdicao,
                                DateTime $dataProximoEstudo,
                                DateTime $dataUltimoEstudo,
                                int $idCurso, int $nivelEstudo){
        $this->id=$id;
        $this->assunto=$assunto;
        $this->pergunta=$pergunta;
        $this->resposta=$resposta;
        $this->midiaPergunta=$midiaPergunta;
        $this->midiaResposta=$midiaResposta;
        $this->dataAdicao=$dataAdicao;
        $this->dataProximoEstudo=$dataProximoEstudo;
        $this->dataUltimoEstudo=$dataUltimoEstudo;
        $this->idCurso=$idCurso;
        $this->nivelEstudo=$nivelEstudo;
    }
}