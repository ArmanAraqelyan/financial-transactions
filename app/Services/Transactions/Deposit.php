<?php

namespace App\Services\Transactions;

use App\Modules\AccountContract;

class Deposit extends AbstractTransaction
{
    public function performTransaction()
    {
        /** @var AccountContract $account */
        $account = $this->transactionDto->getAccount();
        $account->addBalance($this->transactionDto->getAmount());
        $account->addTransaction($this->transactionDto->transactionData());
    }
}