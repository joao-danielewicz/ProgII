<?php

interface PagamentoInterface{
    function processarPagamento (float $valor);
}

abstract class Pagamento implements PagamentoInterface{
    abstract function processarPagamento(float $valor);
}

class PagamentoCartao extends Pagamento{
    public function processarPagamento(float $valor)
    {
        echo "Pagamento de R$ $valor concluído com sucesso! Verifique sua fatura.";
    }
}

$cartao = new PagamentoCartao();
$cartao->processarPagamento(59.90);