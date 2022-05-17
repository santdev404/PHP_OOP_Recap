<?php


require __DIR__.'/../vendor/autoload.php';

$date = '15/05/2021 3:30PM';

// $dateTime = new DateTime(str_replace('/', '.',$date));

// $dateTime = DateTime::createFromFormat('d/m/Y g:iA', $date);


// var_dump($dateTime);



//Diff

$dateTime1 = new DateTime('05/25/2021 9:15 AM');
$dateTime2 = new DateTime('03/15/2021 3:25 AM');


//echo $dateTime2->diff($dateTime1)->days;
echo $dateTime2->diff($dateTime1)->format('%Y years, %m months, %d days').PHP_EOL;
echo $dateTime2->diff($dateTime1)->format('%a').PHP_EOL;
echo $dateTime2->diff($dateTime1)->format('%R%a').PHP_EOL;
