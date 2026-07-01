<?php
$logFile = __DIR__ . '/storage/logs/laravel.log';
if (file_exists($logFile)) {
    $lines = file($logFile);
    // Reverse array to find the last occurrence of "local.ERROR"
    $reversedLines = array_reverse($lines);
    $found = false;
    foreach ($reversedLines as $line) {
        if (strpos($line, 'local.ERROR') !== false) {
            echo "LAST ERROR:\n" . $line;
            $found = true;
            break;
        }
    }
    if (!$found) {
        // Just print the last 50 lines that are NOT stack trace
        $nonStackTrace = array_filter($reversedLines, function($l) { return strpos($l, '#') !== 0; });
        echo "NO local.ERROR. Non-stack trace lines:\n" . implode("", array_slice($nonStackTrace, 0, 20));
    }
}
