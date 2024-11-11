<?php

class Database {
    public function getConnection(){
        try {
            $pdo = new PDO("mysql:dbname=tarefas;host:127.0.0.1", "root", "root");
            return $pdo;
        }catch(PDOException $err){

        }
    }
}