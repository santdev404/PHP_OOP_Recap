<?php


require __DIR__.'/../vendor/autoload.php';

// varibale, anonymous & arrow function


function sum(int|float ...$numbers): int|float{
    return array_sum($numbers);
}
$x = 'sum';


if(is_callable($x)){
    echo $x(1,2,3,4).PHP_EOL;
}else{
    echo 'Not callable';
}


//lambda
$i = 9;
$suma = function (int|float ...$numbers) use($i): int|float{
    echo $i.PHP_EOL;
    return array_sum($numbers);
};

echo $suma(4,5,6,7).PHP_EOL;

//callable
$array = [1,2,3,4];
$array2 = array_map(function($element){
    return $element * 2;
}, $array);

print_r($array).PHP_EOL;
print_r($array2).PHP_EOL;


echo "callable".PHP_EOL;
$add = function(callable $callback, int|float ...$numbers): int|float{
    return $callback(array_sum($numbers));
};

echo $add(function($element){
    return $element * 2;
}, 9,8,7,6).PHP_EOL;

//arrow
echo "arrow".PHP_EOL;
$array = [1,2,4,5];

$array2 = array_map(fn($number) => $number * $number, $array);

print_r($array2);