<?php

namespace App\Transactions;

abstract class AbstractTransactionData
{
    protected array $transactionData;
    protected int $amount;
    protected string $comment;
    protected string $dueDate;
    protected string $type;

    public function __construct(array $transactionData)
    {
        $this->transactionData = $transactionData;
        $this->amount = $transactionData['amount'];
        $this->comment = $transactionData['comment'];
        $this->dueDate = $transactionData['due_date'];
        $this->type = $transactionData['type'];
    }

    public function __get($property)
    {
        if (!property_exists($this, $property)) {
            throw new \Exception("Property does not exist");
        }
        return $this->{$property};
    }

    abstract public function transactionData(): array;
}