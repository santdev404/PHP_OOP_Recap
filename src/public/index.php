<?php

/*
declare(strict_types=1);

require_once '../Transaction.php';

$transction = (new Transaction(100, 'Transaction 1'))
                ->addTax(8)
                ->applyDiscount(10);


var_dump($transction->getAmount());

*/

// require_once '../app/PaymentGateway/Paddle/Transaction.php';
// require_once '../app/PaymentGateway/Stripe/Transaction.php';
// require_once '../app/PaymentGateway/Paddle/CustomerProfile.php';

// spl_autoload_register(function($class){
//     $path =  __DIR__ .'/../'. lcfirst(str_replace('\\','/', $class)).'.php';
//     if(file_exists($path)){
//         require $path;
//     }
// });

require __DIR__.'/../vendor/autoload.php';

// $id = new \Ramsey\Uuid\UuidFactory();

// echo $id->uuid4();

use App\PaymentGateway\Paddle\Transaction as PaddleTransaction;
use App\PaymentGateway\Stripe\Transaction as StripeTrasnsaction;
use App\Enums\Status;


$transction = new PaddleTransaction();

// echo $transction::STATUS_PAID;
$transction->setStatus(Status::PAID);
var_dump($transction);