<?php

$base = [];

function sum(array $array) {
    if (!$array) {
        return 0;
    }

    $shifted = array_shift($array);

    return $shifted + sum($array);
}


//function max(array $array) {
//    $shifted = array_shift($array);
//    if (!$array) {
//        return $shifted;
//    }
//
//    return $shifted ;
//}

echo sum([1,2,3]);