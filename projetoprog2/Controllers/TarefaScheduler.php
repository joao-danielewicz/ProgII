<?php
namespace Controllers;
use DateTime;
use DateInterval;

class TarefaScheduler{
    private function GetProximaDataEstudo($tarefa){
        $dataProximoEstudo = new DateTime('now');
        $dataProximoEstudo->add(new DateInterval('P'.(2**$tarefa['nivelEstudo']).'D'));

        return date_format($dataProximoEstudo, "Y-m-d");
    }

    public function CadastroTarefa($tarefa){
        $tarefa['nivelEstudo'] = 0;
        $tarefa['dataAdicao'] = date_format(new DateTime('now'), "Y-m-d");
        $tarefa['dataUltimoEstudo'] = date_format(new DateTime('now'), "Y-m-d");
        $tarefa['dataProximoEstudo'] = $this->GetProximaDataEstudo($tarefa);        
        
        return $tarefa;
    }

    public function Estudar($tarefa){
        if($tarefa['estudar'] == "dificil"){
            if($tarefa['nivelEstudo'] != 0){
                $tarefa['nivelEstudo'] --;
            }
        }else if($tarefa['estudar'] == "facil"){
            if($tarefa['nivelEstudo'] != 8){
                $tarefa['nivelEstudo'] ++;
            }
        }


        $tarefa['dataUltimoEstudo'] = date_format(new DateTime('now'), "Y-m-d");
        $tarefa['dataProximoEstudo'] = $this->GetProximaDataEstudo($tarefa);

        unset($tarefa['estudar']);
        return $tarefa;
    }
}