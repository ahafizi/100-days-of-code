<?php

function selectionSort(array &$array): array {
    $count = sizeof($array);
    if ($count <= 0) {
        return [];
    }

    for ($i = 0; $i < $count; $i++) {
        $k = $i;
        for ($j = $i + 1; $j < $count; $j++) {
            if ($array[$j] < $array[$k]) {
                $k = $j;
            }
        }

        $array = swapPosition($array, $i, $k);
    }

    return $array;
}
function swapPosition(array $items, $left, $right): array {
    $oldRight = $items[$right];
    $items[$right] = $items[$left];
    $items[$left] = $oldRight;

    return $items;
}

function printArray (array $array, $n) {
    for ($i = 0; $i < $n; $i++)
        echo $array[$i]." ";
    echo "\n";
}

$array = [2,8,-45,-1,-32,5,4,7,26,31,2,1];
$n = sizeof($array);
echo "Original Array\n";
printArray($array, $n);

selectionSort($array);
echo "\nSorted Array\n";
PrintArray($array, $n);