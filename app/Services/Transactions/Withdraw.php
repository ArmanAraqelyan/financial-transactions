<?php

namespace App\Services\Transactions;

use App\Modules\AccountContract;
use Exception;

class Withdraw extends AbstractTransaction
{
    public function performTransaction()
    {
        /** @var AccountContract $account */
        $account = $this->transactionDto->getAccount();
        try {
            $account->takeOfBalance($this->transactionDto->getAmount());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        $account->addTransaction($this->transactionDto->transactionData());
    }
}