<?php

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;

// use DateTime;

class Transaction
{


    private string $status;

    public function __construct()
    {
        //var_dump(new DateTime());
        $this->setStatus(Status::PENDING);
        //var_dump(self::STATUS_PAID);
    }

    public function setStatus(string $status): self
    {
        if(! isset(Status::ALL_STATUSES[$status]))
        {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->status = $status;
        return $this;
    }
}