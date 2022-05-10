<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;

// use DateTime;

class Transaction
{

    private static int $count = 0;

    public function __construct(
         float $amount,
         string $description
    )
    {
        self::$count++;
    }

    public function process()
    {
        echo 'Processing paddle transaction';
    }

    public static function getCount(): int
    {
        return self::$count;
    } 

}