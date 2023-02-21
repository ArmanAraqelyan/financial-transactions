<?php

namespace App\Transactions\Withdrawal;

use App\Transactions\AbstractTransaction;
use App\Transactions\TransactionResource;

class WithdrawalAction extends AbstractTransaction
{
    public function performTransaction(): void
    {
        $account = $this->transactionData->account;
        $account->takeOfBalance($this->transactionData->amount);

        TransactionResource::addTransaction(new WithdrawalTransactionResponse($this->transactionData->transactionData()));
    }
}