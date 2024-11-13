<?php
require_once "TarefaScheduler.php";

class TarefasController extends RenderView{
    private $method;
    private $scheduler;

    public function index(){
        if(empty($_COOKIE)){
            header('Location: /');
            die();
        }

        session_start();
        if(!in_array($_GET['curso'], $_SESSION['usuario']->cursos)){
            $this->loadView('/TarefaView', [
                'cursoFound' => false
            ]);
        }
        
        unset($_SESSION['idcurso']);
        $this->loadView('/TarefaView', [
            'cursoFound' => true,
            'tarefas' => $this->GetTarefas($_GET['curso'], $_SESSION['usuario']->idUsuario)
        ]);
    }

    public function __construct($method){
        $this->method = $method;
        $this->scheduler = new TarefaScheduler();
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
    public function GetTarefas($idCurso, $idUsuario){
        $listaTarefas = $this->method->SelectAllTarefas($idCurso, $idUsuario);
        return $this->BuildTarefas($listaTarefas);
    }
    
    public function GetTarefasByDate($idCurso, $data, $idUsuario){
        $listaTarefas = $this->method->SelectTarefasByDate($idCurso, $data, $idUsuario);
        return $this->BuildTarefas($listaTarefas);
    }

    public function GetNovasTarefas($idCurso, $idUsuario){
        $listaTarefas = $this->method->SelectNovasTarefas($idCurso, $idUsuario);
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