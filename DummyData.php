<?php

use App\Accounts\AccountController;
use App\Transactions\Deposit\DepositTransactionData;
use App\Transactions\Withdrawal\WithdrawalTransactionData;
use App\Transactions\Transfer\TransferTransactionData;
use App\Transactions\TransactionController;

class DummyData
{
    public static function init()
    {
        $accountController = new AccountController();
        $transactionController = new TransactionController();

        $firstAccount = $accountController->getAccount('123456');
        $secondAccount = $accountController->getAccount('789456');

        $depositData = [
            'account' => $firstAccount,
            'amount' => 10,
            'comment' => 'b',
            'due_date' => '20-02-2023',
            'type' => 'deposit'
        ];

        $transactionController->createTransaction(new DepositTransactionData($depositData));

        $withdrawalData = [
            'account' => $firstAccount,
            'amount' => 5,
            'comment' => 'c',
            'due_date' => '10-02-2023',
            'type' => 'withdrawal'
        ];

        $transactionController->createTransaction(new WithdrawalTransactionData($withdrawalData));

        $transferData = [
            'account' => $firstAccount,
            'to_account' => $secondAccount,
            'amount' => 5,
            'comment' => 'a',
            'due_date' => '15-02-2023',
            'type' => 'transfer'
        ];

        $transactionController->createTransaction(new TransferTransactionData($transferData));

        $firstAccount->getBalance();
        $accountController->getAllAccounts();
        $transactionController->getTransactions();
        $transactionController->getSortedTransactions('comment');
    }
}