<?php

function quicksort(array $array) {
    $count = count($array);

    if ($count <= 1) {
        return $array;
    }

    $baseValue = $array[0];

    $right = $left = array();

    for ($i = 1; $i < $count; $i++) {
        if ($baseValue > $array[$i]) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }

    }

    $left = quicksort($left);
    $right = quicksort($right);

    return array_merge($left, array($baseValue), $right);
}

var_dump(quicksort([10,5,2,3,12,2]));