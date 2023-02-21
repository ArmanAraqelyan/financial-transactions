<?php

namespace App\Transactions\Withdrawal;

use App\Transactions\TransactionResponse;

class WithdrawalTransactionResponse extends TransactionResponse
{
    protected int $amount;
    protected string $comment;
    protected string $dueDate;
    protected string $type;
    protected int $accountId;

    public function __construct(array $transactionData)
    {
        $this->amount = $transactionData['amount'];
        $this->comment = $transactionData['comment'];
        $this->dueDate = $transactionData['due_date'];
        $this->type = $transactionData['type'];
        $this->accountId = $transactionData['account']->getId();
    }
}