<?php

// O Encapsulamento diz respeito à proteção de dados dentro da implementação das classes. É como se uma informação fosse envolvida por algo,
// ou seja, o acesso a ela é protegido de alguma maneira: total ou parcialmente de acordo com algumas regras pré-definidas.
// Existem diversos tipos de encapsulamento: totalmente público, visível apenas dentro da classe e suas subclasses ou totalmente privado.

// No PHP, existem as palavras reservadas public, protected e private. Elas virão antes do nome dos atributos ou antes da palavra 'function' na assinatura dos métodos.

// No exemplo abaixo, a classe ContaBancaria terá quatro atributos: nome, saldo, CPF, e porcentagem de juros. A porcentagem dos juros deverá ser privada para
// evitar qualquer tipo de manipulação.
// O único atributo acessível fora da classe será o nome do dono da conta.
// No momento da criação da conta, o saldo será corrigido utilizando a porcentagem definida pelo banco.

// Como é o método construtor da classe que irá criar efetivamente a conta, ele deverá ser público. Entretanto, o acesso da correção do saldo será privado,
// pois será utilizado somente quando a lógica do negócio julgar necessário.


class ContaBancaria{
    public $nome;
    protected $saldo;
    protected $cpf;
    private $porcentagemJuros = 0.012;

    private function CorrigirSaldo(){
        $this->saldo = $this->saldo*(1+$this->porcentagemJuros);
    }

    public function __construct($nome, $saldo, $cpf){
        $this->nome = $nome;
        $this->saldo = $saldo;
        $this->cpf = $cpf;

        $this->CorrigirSaldo();
    }

    public function Extrato(){
        return "Seu saldo atual é: $this->saldo";
    }
}

$novaConta = new ContaBancaria('Fulano da Silva', 100, '123456789-00');
echo($novaConta->nome);
echo("\n".$novaConta->Extrato());