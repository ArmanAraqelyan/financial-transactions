<?php

namespace App\Services\ManageAccounts;

use App\Modules\Account;
use App\Modules\AccountContract;

class AccountList
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

    /**
     * @param string $accountId
     * @return Account
     */
    public function getBalance(string $accountId): AccountContract
    {
        return $this->accounts[$accountId]->getBalance();
    }

    public function getTransactions(): array
    {
        $transactions = [];
        $accounts = $this->getAllAccounts();
        /** @var AccountContract $account */
        foreach ($accounts as $account) {
            $transactions[] = $account->getTransactions();
        }

        return reset($transactions);
    }

    public function getTransactionBySortedComment(): array
    {
        $transactions = $this->getTransactions();
        usort( $transactions, function ($a, $b) {
            return strcmp($a['comment'], $b['comment']);
        });
        return $transactions;
    }

    public function getTransactionBySortedDueDate(): array
    {
        $transactions = $this->getTransactions();
        usort($transactions, function ($a, $b) {
            return strcmp($a['due_date'], $b['due_date']);
        });
        return $transactions;
    }
}