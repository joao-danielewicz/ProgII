<?php

require_once "Utils.php";

class CosmeticsOnDatabase{
    private $conexao;
    
    public function __construct($bdServidor = 'localhost', $bdUsuario = 'root', $bdSenha = 'root', $bdBanco = 'tarefas', $port = '3306'){
        
        $this->conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, $port);
    }
    
    
    public function SelectAllCosmetics(){
        $sqlBusca = "SELECT * FROM itensCosmeticos";
        $resultado = mysqli_query($this->conexao, $sqlBusca);
        
        $cursos = [];
        while($curso = mysqli_fetch_assoc($resultado)){
            $cursos[] = $curso;
        }
        
        return $cursos;
    }

    public function Insert($itemCosmetico){
        $itemCosmetico['midia'] = pegarImagem($_FILES['midia']);

        $sqlInsert = "INSERT INTO itensCosmeticos (descricao, tipo, preco, midia)
                        VALUES(
                        '{$itemCosmetico['descricao']}',
                        '{$itemCosmetico['tipo']}',
                        '{$itemCosmetico['preco']}',
                        '{$itemCosmetico['midia']}'
                    )";
        return mysqli_query($this->conexao, $sqlInsert);
    }
    
    public function Update($item){
        $sqlUpdate = "UPDATE itensCosmeticos SET 
                    descricao = '{$item['descricao']}',
                    tipo = '{$item['tipo']}',
                    preco = '{$item['preco']}'";

        if(!empty($_FILES['midia']['name'])){
            $item['midia'] = pegarImagem($_FILES['midia']);
            $sqlUpdate .= ", midia = '{$item['midia']}'";
        }

        $sqlUpdate .= " WHERE idItem = '{$item['idItem']}'";
        return mysqli_query($this->conexao, $sqlUpdate);
    }

    
    public function Delete($item){
        $sqlDelete = "DELETE FROM itensCosmeticos WHERE idItem = '{$item['idItem']}'";
        return mysqli_query($this->conexao, $sqlDelete);
    }
}