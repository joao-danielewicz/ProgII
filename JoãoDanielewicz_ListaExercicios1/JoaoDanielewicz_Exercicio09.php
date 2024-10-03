<?php

// O polimorfismo é útil pois aumenta a confiança que temos no código, bem como sua reusabilidade.
// Digamos que a classe Motocicleta tem o método Acelerar. A classe Caminhão também terá o método Acelerar. Entretanto, ambos funcionam de maneira diferente,
// logo, haverá uma diferença no comportamento do método Acelerar.
// Agora, imagine que escrevemos 100 linhas de código, e temos a variável veiculo do tipo Caminhão, usando o método com a assinatura Acelerar.
// Se, em determinado momento, desejarmos mudar o tipo da variável veiculo de Caminhão para Motocicleta, poderemos fazer isto apenas na linha de código em que ela foi declarada,
// visto que ambas as classes possuem a mesma assinatura para o método Acelerar. Assim, as 100 linhas de código que escrevemos ainda funcionarão.

// Caso contrário, se os nomes dos métodos fossem diferentes, como por ex. : AcelerarCaminhão ou AcelerarMotocicleta, somente a mudança na declaração da variável veiculo não seria suficiente,
// pois teríamos que alterar também todas as partes que utilizam do método AcelerarCaminhão para AcelerarMotocicleta.

// Ou seja, é fundamental utilizarmos o polimorfismo em áreas suscetíveis a mudanças e em seções do código que irão lidar com classes diferentes, mas que terão

class Caminhao{
    public function Acelerar(){
        return "Você pisa no pedal para acelerar o Caminhão.";
    }
}

class Motocicleta{
    public function Acelerar(){
        return "Você gira o manete para trás para acelerar a Motocicleta.";
    }
}

$veiculo = new Caminhao();
echo($veiculo->Acelerar());

$veiculo = new Motocicleta();
echo("\n".$veiculo->Acelerar());