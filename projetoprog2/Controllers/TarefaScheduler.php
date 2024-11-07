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

    private function SetNivelEstudo($dificuldade){
        if($dificuldade == 'dificil'){
            return -1; 
        }
        if($dificuldade == "facil"){
            return 1;
        }
    }


    public function Estudar($tarefa){
        if($tarefa['estudar'] == "dificil"){
            if($tarefa['nivelEstudo'] != 0){
                $tarefa['nivelEstudo'] --;
            }
        }else if($tarefa['estudar'] == "facil"){
            $tarefa['nivelEstudo'] ++;
        }


        $tarefa['dataUltimoEstudo'] = date_format(new DateTime('now'), "Y-m=d");
        $tarefa['dataProximoEstudo'] = $this->GetProximaDataEstudo($tarefa);

        unset($tarefa['estudar']);
        var_dump($tarefa);
        return $tarefa;
    }
}