<?php
class Funcionario{
    public string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }
}

class Departamento{
    public string $titulo;
    public array $funcionarios;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function adicionarFuncionario(Funcionario $funcionario){
        $this->funcionarios[] = $funcionario;
    }
}

class Empresa{
    public string $razaoSocial;
    public array $departamentos;

    public function __construct(string $razaoSocial, Departamento $departamento)
    {
        $this->razaoSocial = $razaoSocial;
        $this->departamentos[] = $departamento;
    }

    public function adicionarDepartamento(Departamento $departamento)
    {
        $this->departamentos[] = $departamento;
    }
}

// Podemos criar vários funcionários sem que eles estejam inseridos num departamento.
$funcionario1 = new Funcionario('João');
$funcionario2 = new Funcionario('Isabela');
$funcionario3 = new Funcionario('Igor');

// Do mesmo modo, podemos criar departamentos sem que nenhum funcionário esteja inserido nele.
// Uma função separada da construtora nos permite cadastrar funcionários num departamento.
$departamento = new Departamento('RH');
$departamento->adicionarFuncionario($funcionario1);

// Porém, ao instanciarmos a classe Empresa, devemos inserir ao menos um departamento nela.
// Isto faz com que ela seja composta pelos departamentos, não podendo existir sem ele(s).
$empresa = new Empresa('Papéis Canson', $departamento);

var_dump($empresa);