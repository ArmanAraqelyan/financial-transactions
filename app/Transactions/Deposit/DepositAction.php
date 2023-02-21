<?php

namespace App\Transactions\Deposit;

use App\Transactions\AbstractTransaction;
use App\Transactions\TransactionResource;

class DepositAction extends AbstractTransaction
{
    public function performTransaction(): void
    {
        $account = $this->transactionData->account;
        $account->addBalance($this->transactionData->amount);
        TransactionResource::addTransaction(new DepositTransactionResponse($this->transactionData->transactionData()));
    }
}