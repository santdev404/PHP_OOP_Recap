<?php

namespace App;

class Invoice
{

    public string $id;
    public float $amount;

    public function __construct($amount)
    {
        $this->id = random_int(10000, 99999999);
        $this->amount = $amount;
    }

}