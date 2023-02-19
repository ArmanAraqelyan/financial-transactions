<?php

namespace App\Dto;

abstract class AbstractTransactionData
{
    protected array $transactionDetails;
    private array $transactionData;
    private int $amount;
    private string $comment;
    private string $dueDate;

    public function __construct(array $transactionData)
    {
        $this->transactionData = $transactionData;
        $this->amount = $transactionData['amount'];
        $this->comment = $transactionData['comment'];
        $this->dueDate = $transactionData['due_date'];

        $this->setTransactionData();
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    public function getTransactionData(): array
    {
        return $this->transactionData;
    }

    private function setTransactionData(): void
    {
        $this->transactionDetails = [
            'amount' => $this->amount,
            'comment' => $this->comment,
            'due_date' => $this->dueDate,
        ];
    }

    abstract public function transactionData(): array;
}