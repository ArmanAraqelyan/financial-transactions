<?php

namespace App\Modules;

use App\Dto\AbstractTransactionData;
use Exception;

class Account implements AccountContract
{
    private string $id;
    private array $transactions = [];
    private int $balance = 0;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function addBalance(int $balance): void
    {
        $this->balance += $balance;
    }

    public function takeOfBalance(int $balance): void
    {
        if ($this->balance < $balance) {
            throw new Exception('Insufficient Balance');
        }
        $this->balance -= $balance;
    }

    /**
     * @return array<AbstractTransactionData>
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function addTransaction(array $transaction): void
    {
        $this->transactions[] = $transaction;
    }
}