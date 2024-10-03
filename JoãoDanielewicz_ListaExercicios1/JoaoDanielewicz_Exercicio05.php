<?php

// A Herança é um dos pilares fundamentais na programação orientada a objetos. Ela define que a estrutura de uma classe pode ser "idêntica" a outra,
// ou seja, todos os atributos e métodos definidos numa classe Pai irão passar para a classe Filho. Além disso, a classe filho poderá alterar esta estrutura,
// dando um novo retorno aos métodos, adicionando novos atributos ou funções, etc.

// Dentro do PHP, há a palavra reservada 'extends', que pode vir após o nome da Classe em sua declaração.
// Ela irá definir que a classe B irá herdar da classe A, como no exemplo: class b extends a

// No exemplo abaixo, a classe 'CarroEletrico' herdará a estrutura da classe 'Carro', mas implementará a função 'Recarregar'.
// Portanto, somente o CarroEletrico poderá usar a função de recarga da bateria, visto que a mesma foi implementada somente na classe filho, não na classe pai.

class Carro{
    public $modelo;
    public $fabricante;
    public $preco;

    public function __construct($modelo, $fabricante, $preco){
        $this->modelo = $modelo;
        $this->fabricante = $fabricante;
        $this->preco = $preco;
    }
}

class CarroEletrico extends Carro{
    public function recarregar(){
        echo "A bateria do carro foi renovada!";
    }
}

$carroComum = new Carro('Gol', 'Volswagen', '15000');
$carroEletrico = new CarroEletrico('Tesla Model X', 'Tesla', '230000');

$carroEletrico->recarregar();