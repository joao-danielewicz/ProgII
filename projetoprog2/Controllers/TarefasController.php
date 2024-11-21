<?php
require_once "TarefaScheduler.php";

class TarefasController extends RenderView{
    private $method;
    private $scheduler;
    private int $idUsuario;
    
    public function __construct($method){
        $this->method = $method;
        $this->scheduler = new TarefaScheduler();
        session_start();
        $this->idUsuario = $_SESSION['usuario']->idUsuario;
        session_abort();
    }

    public function index($msg = '', $titulo = 'RecapPro - Detalhes do Curso'){
        if(empty($_COOKIE)){
            header('Location: /');
            die();
        }

        
        $tarefas = $this->GetTarefas($_GET['curso'], $this->idUsuario);;

        if($tarefas != "Erro."){
            $this->loadView('/Tarefas/tarefas', [
                'titulo' => $titulo,
                'msg' => $msg,
                'tarefas' => $this->GetTarefas($_GET['curso'], $this->idUsuario)
            ]);
            die();
        }else{
            $this->loadView('/Tarefas/tarefas', [
                'titulo' => $titulo,
                'msg' => 'Este curso não pôde ser encontrado. Tente novamente.'
            ]);
            die();
        }
    }

    private function estudar($idCurso, $msg = '', $titulo = 'RecapPro - Estudar'){
        if(empty($_COOKIE)){
            header('Location: /');
            die();
        }

        $tarefas = $this->GetTarefasByDateOrLevel($idCurso, $this->idUsuario, new DateTime());

        if($tarefas != "Erro."){
            $this->loadView('/Tarefas/estudo', [
                'titulo' => $titulo,
                'tarefas' => $tarefas
            ]);
            die();    
        }
        
        var_dump($this->GetTarefasByDateOrLevel($idCurso, $this->idUsuario, new DateTime()));

        // $this->loadView('/Tarefas/estudo', [
        //     'titulo' => $titulo,
        //     'msg' => 'Este curso não pôde ser encontrado. Tente novamente.'
        // ]);
        // die();

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
    
    public function GetTarefasByDateOrLevel($idCurso, $idUsuario, $data){
        $listaTarefas = $this->method->SelectTarefasByDateOrLevel($idCurso, $idUsuario, $data);
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
    
    public function GetTarefasEstudo($post){
        $this->estudar($post['idCurso']);
    }
}