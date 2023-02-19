<?php

namespace App\Services\Transactions;

use App\Modules\AccountContract;
use Exception;

class Transfer extends AbstractTransaction
{
    public function performTransaction(): void
    {
        /** @var AccountContract $account */
        $account = $this->transactionDto->getAccount();
        try {
            $account->takeOfBalance($this->transactionDto->getAmount());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        /** @var AccountContract $toAccount */
        $toAccount = $this->transactionDto->getToAccount();
        $toAccount->addBalance($this->transactionDto->getAmount());

        $account->addTransaction($this->transactionDto->transactionData());
    }
}