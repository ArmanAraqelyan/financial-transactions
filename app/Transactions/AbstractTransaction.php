<?php

namespace App\Transactions;

abstract class AbstractTransaction
{
    protected AbstractTransactionData $transactionData;

    public function __construct(AbstractTransactionData $transactionData)
    {
        $this->transactionData = $transactionData;
    }

    abstract public function performTransaction(): void;
}