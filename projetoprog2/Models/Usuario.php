<?php

class Usuario{
    public int $idUsuario;
    public string $nome;
    public string $email;

    public function __construct(int $idUsuario, string $nome, string $email){
        $this->idUsuario=$idUsuario;
        $this->nome=$nome;
        $this->email=$email;
    }
}