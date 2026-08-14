<?php
// Simple CLI error view
echo "Exception: " . ($message ?? 'Error') . PHP_EOL;
echo "File: " . ($file ?? '') . " on line " . ($line ?? '') . PHP_EOL;
if (! empty($trace) && is_array($trace)) {
    foreach ($trace as $t) {
        echo " - " . ($t['file'] ?? '') . ':' . ($t['line'] ?? '') . " " . ($t['function'] ?? '') . PHP_EOL;
    }
}
