<?php
namespace Tarefas;

class StorageOnCsv{
    private string $path;
    public function __construct(string $path){
        $this->path = $path;
    }
    
    public function Insert($tarefa){
        $tarefa['id'] = $this->GetNextId();

        $fp = fopen($this->path, 'a');
        fputcsv($fp, $tarefa);
        fclose($fp);
    }

    public function SelectAllTarefas(){
        $fp = fopen($this->path, 'r');
        while (($dados = fgetcsv($fp)) !== false) {
            $array[] = $dados;
        }
        return $array;
    }

    private function GetNextId(){
        if($this->SelectAllTarefas() == null){
            return 1;
        }

        $ids = [];
        foreach($this->SelectAllTarefas() as $tarefa){
            $ids[] = $tarefa[6];
        }
        $nextId = max($ids);
        return $nextId+1;
    }
}