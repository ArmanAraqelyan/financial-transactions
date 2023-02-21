<?php

namespace App\Transactions\Deposit;

use App\Accounts\AccountContract;
use App\Transactions\AbstractTransactionData;

class DepositTransactionData extends AbstractTransactionData
{
    protected AccountContract $account;

    public function __construct(array $transactionData)
    {
        parent::__construct($transactionData);
        $this->account = $transactionData['account'];
    }

    public function transactionData(): array
    {
        $this->transactionData['account'] = $this->account;
        return $this->transactionData;
    }
}