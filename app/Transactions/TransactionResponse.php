<?php

namespace App\Transactions;

abstract class TransactionResponse
{
    public function __get(string $property)
    {
        if (!property_exists($this, $property)) {
            throw new \Exception("Property does not exist");
        }
        return $this->{$property};
    }
}