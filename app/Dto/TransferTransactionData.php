<?php

namespace App\Dto;

use App\Modules\AccountContract;

class TransferTransactionData extends TransactionData
{
    private AccountContract $toAccount;

    /**
     * @return AccountContract
     */
    public function getToAccount(): AccountContract
    {
        return $this->toAccount;
    }

    public function __construct(AbstractTransactionData $transactionData)
    {
        parent::__construct($transactionData->getTransactionData());
        $this->toAccount = $transactionData->getTransactionData()['to_account'];
    }

    public function transactionData(): array
    {
        $this->transactionDetails['to_account'] = $this->toAccount;
        return $this->transactionDetails;
    }
}