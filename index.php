<?php

use App\Dto\TransactionData;
use App\Dto\TransferTransactionData;
use App\Services\ManageAccounts\AccountList;
use App\Services\Transactions\Deposit;
use App\Services\Transactions\Transfer;
use App\Services\Transactions\Withdraw;

require_once dirname(__DIR__) . '/trading/vendor/autoload.php';

$accountList = new AccountList();
$firstAccount = $accountList->getAccount('123456');
$secondAccount = $accountList->getAccount('789456');

$depositData = [
    'account' => $firstAccount,
    'amount' => 10,
    'comment' => 'b',
    'due_date' => '20-02-2023'
];

$withdrawData = [
    'account' => $firstAccount,
    'amount' => 5,
    'comment' => 'c',
    'due_date' => '10-02-2023'
];

$transferData = [
    'account' => $firstAccount,
    'to_account' => $secondAccount,
    'amount' => 5,
    'comment' => 'a',
    'due_date' => '15-02-2023'
];

try {
    $deposit = new Deposit(new TransactionData($depositData));
    $deposit->performTransaction();
    $withdraw = new Withdraw(new TransactionData($withdrawData));
    $withdraw->performTransaction();
    $transfer = new Transfer(new TransferTransactionData(new TransactionData($transferData)));
    $transfer->performTransaction();
} catch (Exception $e) {
}

//$firstAccount->getBalance();
//$accountList->getAllAccounts();
//$accountList->getTransactionBySortedComment();
//$accountList->getTransactionBySortedDueDate();
