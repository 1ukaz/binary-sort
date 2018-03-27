<?php

function binarySort($numbers, $b)
{
    $tmpArray = parseArrayToBinary($numbers, $b);

    usort($tmpArray, function($a, $b) {
        $ca = countBits($a);
        $cb = countBits($b);
        return (($ca == $cb) ? ((bindec($a) < bindec($b)) ? -1 : 1) : ($ca < $cb ? -1 : 1));
    });

    return parseArrayToDisplay($tmpArray);
}

function parseArrayToBinary($array, $bits)
{
    $tmpArray = [];
    foreach ($array as $num) {
        $tmpArray[] = sprintf("%0{$bits}d", decbin($num));
    }

    return $tmpArray;
}

function parseArrayToDisplay($array)
{
    $sortedArray = [];
    foreach ($array as $value) {
        $sortedArray[] = bindec($value) . " ({$value}) Amount of Bits: " . countBits($value);
    }

    return $sortedArray;
}

function countBits($value)
{
    $ones = 0;
    for ($i=0; $i < strlen($value); $i++) {
        if ($value[$i] & 1) {
            $ones++;
        }
    }

    return $ones;
}

$handle = fopen ("php://stdin", "r");

echo ("How many bits you want each item to work on?: ");
fscanf($handle, "%d", $bits);

echo ("How many items you do want to sort binary?: ");
fscanf($handle, "%d", $n);

$numbers = array();
for($numbers_i = 0; $numbers_i < $n; $numbers_i++){
    echo ("Insert item #" . ($numbers_i+1) ." please: ");
    fscanf($handle, "%d", $numbers[]);
}

$result = binarySort($numbers, $bits);
echo ("The sorted values:" . PHP_EOL);
echo implode(PHP_EOL, $result);
