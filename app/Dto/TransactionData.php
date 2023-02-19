<?php

namespace App\Dto;

use App\Modules\AccountContract;

class TransactionData extends AbstractTransactionData
{
    private AccountContract $account;

    public function getAccount(): AccountContract
    {
        return $this->account;
    }

    public function __construct(array $transactionData)
    {
        parent::__construct($transactionData);
        $this->account = $transactionData['account'];
    }

    public function transactionData(): array
    {
        $this->transactionDetails['account'] = $this->account;
        return $this->transactionDetails;
    }
}