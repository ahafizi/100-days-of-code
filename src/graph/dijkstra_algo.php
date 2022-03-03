<?php

define('INFINITE', PHP_INT_MAX);

//first example
//$graph = [];
//$graph["start"]["a"] = 4;
//$graph["start"]["b"] = 2;
//$graph["a"]["fin"] = 1;
//$graph["b"]["a"] = 3;
//$graph["b"]["fin"] = 5;
//$graph["fin"] = [];
//
//$costs = [];
//$costs['a'] = 6;
//$costs['b'] = 2;
//$costs['fin'] = INFINITE;
//
//$parents = [];
//$parents['a'] = "start";
//$parents['b'] = "start";
//$parents["in"] = null;

//second example
$graph["start"]["a"] = 5;
$graph["a"]["c"] = 4;
$graph["a"]["d"] = 2;
$graph["start"]["b"] = 2;
$graph["b"]["a"] = 8;
$graph["b"]["d"] = 7;
$graph["c"]["fin"] = 3;
$graph["c"]["d"] = 6;
$graph["d"]["fin"] = 1;
$graph["fin"] = [];

$costs = [];
$costs['a'] = 5;
$costs['b'] = 2;
$costs['c'] = INFINITE;
$costs['d'] = INFINITE;
$costs['fin'] = INFINITE;

$parents = [];
$parents['a'] = "start";
$parents['b'] = "start";
$parents["in"] = null;

$processed = [];

function findLowestCostNode(array $costs, $processed)
{
    $lowestCost = INFINITE;
    $lowestCostNode = null;
    foreach ($costs as $node => $cost) {
        if ($cost < $lowestCost and !in_array($node, $processed)) {
            $lowestCost = $cost;
            $lowestCostNode = $node;
        }
    }

    return $lowestCostNode;
}

$node = findLowestCostNode($costs, $processed);
$cost = INFINITE;
while ($node != null) {
    $cost = $costs[$node];
    $neighbors = $graph[$node];
    foreach ($neighbors as $key => $neighbor) {
        $newCost = $cost + $neighbor;
        if ($costs[$key] > $newCost) {
            $costs[$key] = $newCost;
            $parents[$key] = $node;
        }
    }
    $processed[] = $node;
    $node = findLowestCostNode($costs, $processed);
}

var_dump($costs["fin"]);