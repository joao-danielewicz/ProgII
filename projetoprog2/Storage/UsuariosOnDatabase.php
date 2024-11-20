<?php

use Models\Usuario;
require_once "Utils.php";


class UsuariosOnDatabase{
    private $conexao;
    
    public function __construct($bdServidor = 'localhost', $bdUsuario = 'root', $bdSenha = 'root', $bdBanco = 'tarefas', $port = '3306'){
        $this->conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, $port);
    }

    private function EncryptPassword($senha){
        return (hash_pbkdf2("sha256", $senha, 'sdgb4433bn6bsfwbsf', 60000));
    }
    
    private function VerificarEmail($login){
        $sqlBusca = "SELECT * FROM usuarios WHERE usuarios.email = '{$login['email']}'";
        $resultado = $resultado = mysqli_query($this->conexao, $sqlBusca);
        $usuario = mysqli_fetch_assoc($resultado);   

        if($usuario){
            $sqlBusca = "SELECT idcurso FROM cursos WHERE cursos.idUsuario = '{$usuario['idUsuario']}'";
            $resultado = $resultado = mysqli_query($this->conexao, $sqlBusca);
            $usuario['cursos'] = mysqli_fetch_array($resultado);

            return $usuario;
        }
        return false;
    }

    private function VerificarSenha($login){
        $usuario = $this->VerificarEmail($login);
        if($usuario){
            if($this->EncryptPassword($login['senha']) === $usuario['senha'] ){
                    unset($usuario['senha']);
                    return $usuario;
                }
            }
            
            return false;
        }

    public function ValidarLogin($login){
        $usuario = $this->VerificarSenha($login);
        return $usuario;
    }

    public function Insert($usuario){
        if(!$this->VerificarEmail($usuario)){
                $usuario['senha'] = $this->EncryptPassword($usuario['senha']);
                $sqlInsert = "INSERT INTO usuarios (nome, email, senha, dataNascimento, telefone)
                    VALUES(
                        '{$usuario['nome']}',
                        '{$usuario['email']}',                    
                        '{$usuario['senha']}',
                        '{$usuario['dataNascimento']}',                    
                        '{$usuario['telefone']}'                    
                )";
            return mysqli_query($this->conexao, $sqlInsert);
        }
        return false;
    }
    
    public function Update($tarefa){
        $sqlUpdate = "UPDATE tarefas SET 
                    assunto = '{$tarefa['assunto']}',
                    pergunta = '{$tarefa['pergunta']}',
                    resposta = '{$tarefa['resposta']}',
                    midiaPergunta = '{$tarefa['midiaPergunta']}',
                    midiaResposta = '{$tarefa['midiaResposta']}',
                    dataadicao = '{$tarefa['dataadicao']}',
                    dataproximoestudo = '{$tarefa['dataproximoestudo']}',
                    dataultimoestudo = '{$tarefa['dataultimoestudo']}',
                    nivelestudo = '{$tarefa['nivelestudo']}'
                    idcurso = '{$tarefa['idcurso']}'
                    WHERE
                    id = '{$tarefa['id']}'";
        return mysqli_query($this->conexao, $sqlUpdate);
    }

    
    public function Delete($usuario){
        $sqlDelete = "DELETE FROM usuarios WHERE idUsuario = '{$usuario['idusuario']}'";
        return mysqli_query($this->conexao, $sqlDelete);
    }
}