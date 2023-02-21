<?php

namespace App\Transactions\Transfer;

use App\Accounts\AccountContract;
use App\Transactions\AbstractTransaction;
use App\Transactions\TransactionResource;

class TransferAction extends AbstractTransaction
{
    public function performTransaction(): void
    {
        $account = $this->transactionData->account;
        $account->takeOfBalance($this->transactionData->amount);
        /** @var AccountContract $toAccount */
        $toAccount = $this->transactionData->toAccount;
        $toAccount->addBalance($this->transactionData->amount);

        TransactionResource::addTransaction(new TransferTransactionResponse($this->transactionData->transactionData()));
    }
}