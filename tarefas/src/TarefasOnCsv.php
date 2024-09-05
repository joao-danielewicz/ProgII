<?php
namespace Tarefas;

class TarefasOnCsv{
    private string $path;

    public function __construct(string $path){
        $this->path = $path;
    }
    
    public function Insert($tarefa){
        $fp = fopen($this->path, 'a');
        fputcsv($fp, $tarefa->toArray());
        fclose($fp);
    }

    public function RetrieveAll(){
        $fp = fopen($this->path, 'r');
        while (($dados = fgetcsv($fp)) !== false) {
            $array[] = $dados;
        }
        
        return $array;
    }
}