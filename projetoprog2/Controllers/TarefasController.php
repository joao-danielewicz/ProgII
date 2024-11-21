<?php
require_once "TarefaScheduler.php";

class TarefasController extends RenderView{
    private $method;
    private $scheduler;

    public function index($msg = ''){
        if(empty($_COOKIE)){
            header('Location: /');
            die();
        }

        session_start();
        $tarefas = $this->GetTarefas($_GET['curso'], $_SESSION['usuario']->idUsuario);
        session_abort();

        if($tarefas != "Erro."){
            $this->loadView('/Tarefas/tarefas', [
                'msg' => $msg,
                'tarefas' => $this->GetTarefas($_GET['curso'], $_SESSION['usuario']->idUsuario)
            ]);
            die();
        }else{
            $this->loadView('/Tarefas/tarefas', [
                'msg' => 'Este curso não pôde ser encontrado. Tente novamente.'
            ]);
            die();
        }
    }

    public function __construct($method){
        $this->method = $method;
        $this->scheduler = new TarefaScheduler();
    }

    public function InsertTarefa($tarefa){
        if(!empty($tarefa)){
            $tarefa = $this->scheduler->CadastroTarefa($tarefa);
            $this->method->Insert($tarefa);
            header("Location: /tarefas?curso=".$tarefa['idCurso']);
            die();
        }
        header("Location: /");
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
        if($listaTarefas != "Erro."){
            return $this->BuildTarefas($listaTarefas);
        }else{
            return "Erro.";
        }
    }
    
    public function GetTarefasByDate($idCurso, $data, $idUsuario){
        $listaTarefas = $this->method->SelectTarefasByDate($idCurso, $data, $idUsuario);
        if($listaTarefas != "Erro."){
            return $this->BuildTarefas($listaTarefas);
        }else{
            return "Erro.";
        }
    }

    public function GetNovasTarefas($idCurso, $idUsuario){
        $listaTarefas = $this->method->SelectNovasTarefas($idCurso, $idUsuario);
        if($listaTarefas != "Erro."){
            return $this->BuildTarefas($listaTarefas);
        }else{
            return "Erro.";
        }
    }
    
    public function UpdateTarefa($post){
        return $this->method->Update($post);
    }

    public function UserUpdateTarefa($post){
        $this->method->UserUpdate($post);
        header("Location: /tarefas?curso=".$post['idCurso']);
        die();
    }

    public function DeleteTarefa($post){
        $this->method->Delete($post);
        header("Location: /tarefas?curso=".$post['idCurso']);
        die();
    }
    
    public function EstudarTarefa($post){
        $tarefa = $this->scheduler->Estudar($post);
        return $this->UpdateTarefa($tarefa);
    }
}