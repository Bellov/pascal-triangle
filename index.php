<?php

function pascalTriangle($rowsToPrint) {
    $previous = [1];
    $next = [];
    $rows = [];
    $nl = '<br>';
    $popen = '<pre>';
    $pclose = '</pre>';
    if (strtolower(php_sapi_name()) === "cli") {
        $nl = PHP_EOL;
        $popen = $pclose = '';
    }

    for ($i = 1; $i <= $rowsToPrint; $i++) {
        $next[0] = $previous[0];

        for ($j = 1; $j < $i; $j++) {
            $next[$j] = $previous[$j] + $previous[$j - 1];
        }

        $rows[] = implode(' ', $next) . $nl;
        //Assign new row as previous
        $previous = $next;
        //Reset next array
        $next = [];
        //Add element for next loop
        $previous[] = 0;
    }
    echo $popen;
    foreach ($rows as $k => $row) {
        $repeat = (strlen($rows[count($rows) - 1]) - strlen($row)) / 2;
        echo str_repeat(' ', $repeat) . $row;
    }
    echo $pclose;
}

pascalTriangle(10);