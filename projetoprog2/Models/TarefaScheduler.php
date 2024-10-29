<?php
include "Utils.php";

class TarefaScheduler{
    private function GetProximaDataEstudo($tarefa){
        $dataProximoEstudo = new DateTime('now');
        $dataProximoEstudo->add(new DateInterval('P'.(2**$tarefa['nivelEstudo']).'D'));

        return date_format($dataProximoEstudo, "Y-m-d");
    }

    public function CadastroTarefa($tarefa){

        $tarefa['nivelEstudo'] = -1;
        $tarefa['dataAdicao'] = date_format(new DateTime('now'), "Y-m-d");
        $tarefa['dataUltimoEstudo'] = null;
        $tarefa['dataProximoEstudo'] = $this->GetProximaDataEstudo($tarefa);        
        
        return $tarefa;
    }
}