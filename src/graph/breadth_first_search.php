<?php

//bfs - поиск в ширину

$graph["you"] = ['alice', 'bob', 'claire'];
$graph["bob"] = ['anuj', 'peggy'];
$graph["alice"] = ['peggy'];
$graph["claire"] = ['thom', 'jonny'];
$graph["anuj"] = ['m'];
$graph["peggy"] = [];
$graph["jonny"] = [];
$graph["thom"] = [];
$graph["m"] = [];

/**
 * With queue php structure
 * @url https://www.php.net/manual/en/class.ds-queue.php
 *
 * @param string $name
 * @param array $graph
 * @return bool
 */
function searchWithQueue(string $name, array $graph): bool
{
    $searchQueue = new \Ds\Queue();
    $searchQueue->push(...$graph[$name]);
    $searched = [];

    while ($searchQueue) {
        $person = $searchQueue->pop();
        if (!in_array($person, $searched)) {
            if (personIsSeller($person)) {
                echo $person . " is a mango seller!";

                return true;
            } else {
                $searchQueue->push(...$graph[$person]);
                $searched[] = $person;
            }
        }
    }

    return false;
}

/**
 * With hash tables
 *
 * @param string $name
 * @param array $graph
 * @return false|void
 */
function searchWithHashTables(string $name, array $graph) {
    $searchQueue = [];
    $searched = [];

    foreach ($graph[$name] as $personName) {
        $searchQueue[] = $personName;
    }

    while ($searchQueue) {
        $personName = array_shift($searchQueue);

        if (!in_array($personName, $searched)) {
            if (personIsSeller($personName)) {
                echo $personName . " is a mango seller!";

                die();
            } else {
                foreach ($graph[$personName] as $item) {
                    $searchQueue[] = $item;
                }

                $searched[] = $personName;
            }
        }
    }

    return false;
}

function personIsSeller($name): bool
{
    return $name === 'm';
}

echo searchWithHashTables('you', $graph);
echo searchWithQueue('you', $graph);
