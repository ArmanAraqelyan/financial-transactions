<?php

namespace App\Services\Transactions;

use App\Dto\AbstractTransactionData;

abstract class AbstractTransaction
{
    protected AbstractTransactionData $transactionDto;

    public function __construct(AbstractTransactionData $transactionDto)
    {
        $this->transactionDto = $transactionDto;
    }

    abstract public function performTransaction();
}