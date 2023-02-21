<?php

namespace App\Accounts;

class AccountController
{
    private AccountResource $accountResource;

    public function __construct()
    {
        $this->accountResource = new AccountResource();
    }

    /**
     * @return array<AccountContract>
     */
    public function getAllAccounts(): array
    {
        return $this->accountResource->getAllAccounts();
    }

    public function getAccount(string $id): AccountContract
    {
        return $this->accountResource->getAccount($id);
    }

    public function getBalance(string $accountId): AccountContract
    {
        return $this->accountResource->getBalance($accountId);
    }
}