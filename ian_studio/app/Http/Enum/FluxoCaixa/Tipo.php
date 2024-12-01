<?php

namespace App\Http\Enum\FluxoCaixa;

enum Tipo :string
{
    case RECEITA = 'RECEITA';
    case DESPESA = 'DESPESA';
    case TRANSFERENCIA = 'TRANSFERENCIA';
    case PAGAMENTO = 'PAGAMENTO';
    case PAGTO_CLIENTE = 'PAGTO_CLIENTE';
    case PAGTO_FORNECEDOR = 'PAGTO_FORNECEDOR';
    case OUTROS = 'OUTROS';
    case CREDITO = 'CREDITO';
    case DEBITO = 'DEBITO';
    case CORRENTE = 'CORRENTE';
    case CHEQUE = 'CHEQUE';
    case DOC_RECEBIMENTO = 'DOC_RECEBIMENTO';
    case DOC_PAGAMENTO = 'DOC_PAGAMENTO';
    case DOC_TRANSFERENCIA = 'DOC_TRANSFERENCIA';
}
