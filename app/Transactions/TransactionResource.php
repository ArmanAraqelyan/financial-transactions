<?php

namespace App\Transactions;

class TransactionResource
{
    private static array $transactions = [];

    public static function addTransaction(TransactionResponse $transaction): void
    {
        self::$transactions[] = $transaction;
    }

    public static function getTransactions(): array
    {
        return self::$transactions;
    }

    public static function getSortedTransactions(string $sortBy): array
    {
        $transactions = self::$transactions;
        usort( $transactions, function ($a, $b) use ($sortBy) {
            return strcmp($a->{$sortBy}, $b->{$sortBy});
        });
        return $transactions;
    }
}