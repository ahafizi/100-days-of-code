<?php

function binary_search(array $sortedList, $item) {
    $low = 0;
    $high = count($sortedList) - 1;

    $k = 0;
    while ($low <= $high) {
        $mid = round(($low + $high) / 2);
        $guess = $sortedList[$mid];
        $k++;

        if ($guess == $item) {
            return ['guess' => $guess, 'count' => $k];
        }
        if ($guess > $item) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }

    return null;
}

var_dump(binary_search([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15], 1));