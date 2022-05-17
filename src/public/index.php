<?php


require __DIR__.'/../vendor/autoload.php';

$date = new DateTime('05/12/21 3:30PM');

echo $date->getTimezone()->getName().' - '.$date->format('m/d/Y g:i A').PHP_EOL;

$date->setDate(2021, 4, 21)->setTime(2,15);
$date->setTimezone(new DateTimeZone('Europe/Amsterdam'));

echo $date->getTimezone()->getName().' - '.$date->format('m/d/Y g:i A').PHP_EOL;
