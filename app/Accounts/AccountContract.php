<?php

namespace App\Accounts;

interface AccountContract
{
    public function getId(): string;
    public function getBalance(): int;
    public function addBalance(int $balance): void;
    public function takeOfBalance(int $balance): void;
}