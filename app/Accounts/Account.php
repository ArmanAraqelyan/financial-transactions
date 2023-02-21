<?php

namespace App\Accounts;

class Account implements AccountContract
{
    private string $id;
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
        $this->balance -= $balance;
    }
}