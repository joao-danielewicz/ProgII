<?php

class Usuario{
    public int $idUsuario;
    public string $nome;
    public string $email;
    public DateTime $dataNascimento;
    public string $telefone;
    public int $isAdmin;
    public Array $cursos;

    public function __construct(int $idUsuario, string $nome, string $email, $cursos, DateTime $dataNascimento, string $telefone, int $isAdmin){
        $this->idUsuario=$idUsuario;
        $this->nome=$nome;
        $this->email=$email;
        $this->dataNascimento=$dataNascimento;
        $this->telefone=$telefone;
        $this->cursos = $cursos;
        $this->isAdmin = $isAdmin;
       
    }
}