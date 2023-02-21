<?php

namespace App\Transactions;

class TransactionController
{
    public function createTransaction(AbstractTransactionData $transactionData): void
    {
        (AbstractTransactionFactory::create($transactionData))->performTransaction();
    }

    public function getTransactions(): array
    {
        return TransactionResource::getTransactions();
    }

    public function getSortedTransactions(string $sortBy): array
    {
        return TransactionResource::getSortedTransactions($sortBy);
    }
}