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
            'concluida' => $tarefa['concluida']
        ];
        

        $fp = fopen($this->path, 'a');
        fputcsv($fp, $tarefaCadastro);
        fclose($fp);
    }

    public function SelectAllTarefas(){
        $fp = fopen($this->path, 'r');
        while (($dados = fgetcsv($fp)) !== false) {
            $array[] =  [
                'id' => $dados[0],
                'nome' => $dados[1],
                'descricao' => $dados[2],
                'prioridade' => $dados[3],
                'prazo' => $dados[4],
                'concluida' => $dados[5],
            ];  
        }
        if(!isset($array)){
            return null;
        }
        return $array;
    }


    private function GetNextId(){
        if($this->SelectAllTarefas() == null){
            return 1;
        }

        $ids = [];
        foreach($this->SelectAllTarefas() as $tarefa){
            $ids[] = $tarefa['id'];
        }
        $nextId = max($ids);
        return $nextId+1;
    }
}