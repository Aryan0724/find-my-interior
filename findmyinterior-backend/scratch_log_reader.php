<?php
$lines = file('storage/logs/laravel.log');
$errorLines = [];
$found = false;
foreach(array_reverse($lines) as $line) {
    if (strpos($line, 'local.ERROR:') !== false) {
        $found = true;
    }
    if ($found) {
        array_unshift($errorLines, $line);
        if (count($errorLines) > 50) break;
    }
}
echo implode("", $errorLines);
