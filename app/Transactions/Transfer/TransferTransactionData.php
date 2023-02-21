<?php

namespace App\Transactions\Transfer;

use App\Accounts\AccountContract;
use App\Transactions\AbstractTransactionData;

class TransferTransactionData extends AbstractTransactionData
{
    protected AccountContract $account;
    protected AccountContract $toAccount;

    public function __construct(array $transactionData)
    {
        parent::__construct($transactionData);
        $this->account = $transactionData['account'];
        $this->toAccount = $transactionData['to_account'];
    }

    public function transactionData(): array
    {
        $this->transactionData['account'] = $this->account;
        $this->transactionData['to_account'] = $this->toAccount;
        return $this->transactionData;
    }
}