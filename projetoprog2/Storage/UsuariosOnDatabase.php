<?php
namespace Storage;

require_once "..\Models\Usuario.php";
require_once "Utils.php";
use DateTime;


class UsuariosOnDatabase{
    private $conexao;
    
    public function __construct($bdServidor = 'localhost', $bdUsuario = 'root', $bdSenha = 'root', $bdBanco = 'tarefas', $port = '3306'){
        $this->conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, $port);
    }
    
    private function VerificarLogin($email){
        $sqlBusca = "SELECT email FROM usuarios WHERE usuarios.email = '{$email}'";
        $resultado = $resultado = mysqli_query($this->conexao, $sqlBusca);
        $email = mysqli_fetch_assoc($resultado);        
        return $email;
    }

    public function ValidarLogin($email){
        if($this->VerificarLogin($email)!=null){
            return true;
        }else{
            return false;
        }
    }

    public function Insert($usuario){
        $sqlInsert = "INSERT INTO usuarios (nome, email, senha)
                VALUES(
                    '{$usuario['nome']}',
                    '{$usuario['email']}',                    
                    '{$usuario['senha']}'
            )";
        return mysqli_query($this->conexao, $sqlInsert);
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