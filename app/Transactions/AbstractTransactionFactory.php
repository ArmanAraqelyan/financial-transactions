<?php

namespace App\Transactions;

use App\Transactions\Deposit\DepositAction;
use App\Transactions\Transfer\TransferAction;
use App\Transactions\Withdrawal\WithdrawalAction;

abstract class AbstractTransactionFactory
{
    public static function create(AbstractTransactionData $transactionData): AbstractTransaction
    {
        return match ($transactionData->type) {
            'deposit' => new DepositAction($transactionData),
            'withdrawal' => new WithdrawalAction($transactionData),
            'transfer' => new TransferAction($transactionData),
        };
    }
}