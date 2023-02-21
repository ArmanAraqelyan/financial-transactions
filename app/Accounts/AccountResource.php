<?php

namespace App\Accounts;

class AccountResource
{
    private array $accountIds = [
        '123456',
        '789456',
    ];

    private array $accounts;

    public function __construct()
    {
        foreach ($this->accountIds as $accountId) {
            $this->accounts[] = new Account($accountId);
        }
    }

    /**
     * @return array<AccountContract>
     */
    public function getAllAccounts(): array
    {
        return $this->accounts;
    }

    public function getAccount(string $id): AccountContract
    {
        $account = array_filter($this->accounts, function($account) use ($id){
                return $account->getId() === $id;
            });

        return reset($account);
    }

    public function getBalance(string $accountId): AccountContract
    {
        return $this->accounts[$accountId]->getBalance();
    }
}