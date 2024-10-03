<?php

class Animal{
    public function FazerSom(){
        return "Raw!";
    }
}

class Cachorro{
    public function FazerSom(){
        return "Au au!";
    }
}
class Gato{
    public function FazerSom(){
        return "Miau!";
    }
}

$animal = new Animal();
echo("\n".$animal->FazerSom());

$animal = new Gato();
echo("\n".$animal->FazerSom());

$animal = new Cachorro();
echo("\n".$animal->FazerSom());