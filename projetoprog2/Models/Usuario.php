<?php

class Usuario{
    public int $idUsuario;
    public string $nome;
    public string $email;
    public Array $cursos;

    public function __construct(int $idUsuario, string $nome, string $email, $cursos){
        $this->idUsuario=$idUsuario;
        $this->nome=$nome;
        $this->email=$email;
        if($cursos == null){
            $this->cursos = [];
        }else{
            $this->cursos = $cursos;
        }
    }
}