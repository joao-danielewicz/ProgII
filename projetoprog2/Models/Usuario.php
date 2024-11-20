<?php

class Usuario{
    public int $idUsuario;
    public string $nome;
    public string $email;
    public DateTime $dataNascimento;
    public string $telefone;
    public Array $cursos;

    public function __construct(int $idUsuario, string $nome, string $email, $cursos, DateTime $dataNascimento, string $telefone){
        $this->idUsuario=$idUsuario;
        $this->nome=$nome;
        $this->email=$email;
        $this->dataNascimento=$dataNascimento;
        $this->telefone=$telefone;
        if($cursos == null){
            $this->cursos = [];
        }else{
            $this->cursos = $cursos;
        }
    }
}