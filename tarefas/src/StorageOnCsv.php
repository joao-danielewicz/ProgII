<?php
namespace Tarefas;
use Exception;

class StorageOnCsv{
    private string $path;
    public function __construct(string $path){
        $this->path = $path;
    }
    
    public function Insert(array $tarefa){
        $tarefaCadastro = [
            'id'=> isset($tarefa['id']) ? $tarefa['id'] : $this->GetNextId(),
            'nome' => $tarefa['nome'],
            'descricao' => $tarefa['descricao'],
            'prioridade' => $tarefa['prioridade'],
            'prazo' => $tarefa['prazo'],
            'concluida' => isset($tarefa['concluida']) ? 1 : 0
        ];
        

        $fp = fopen($this->path, 'a');
        fputcsv($fp, $tarefaCadastro);
        fclose($fp);
    }

    private function BuildTarefasFromCsv(array $listaTarefas){
        $tarefasObj = [];
        foreach($listaTarefas as $tarefa){
            $tarefasObj[] = new Tarefa($tarefa[0], $tarefa[1], $tarefa[2], $tarefa[3], $tarefa[4], $tarefa[5]);
        }
        return $tarefasObj;
    }

    public function SelectAllTarefas(){
        $fp = fopen($this->path, 'r');
        while (($dados = fgetcsv($fp)) !== false) {
            $array[] = $dados;
        }
        
        if(!isset($array)){
            return null;
        }
        return $this->BuildTarefasFromCsv($array);
    }


    private function GetNextId(){
        if($this->SelectAllTarefas() == null){
            return 1;
        }

        $ids = [];
        foreach($this->SelectAllTarefas() as $tarefa){
            $ids[] = $tarefa->id;
        }
        $nextId = max($ids);
        return $nextId+1;
    }
}