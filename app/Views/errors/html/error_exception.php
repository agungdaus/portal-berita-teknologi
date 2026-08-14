<?php
// Development error view - shows exception details.
/** @var string $title */
/** @var string $type */
/** @var int $code */
/** @var string $message */
/** @var string $file */
/** @var int $line */
/** @var array $trace */
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= esc($title ?? 'Error') ?></title>
    <style>body{font-family:system-ui,Arial;margin:20px;color:#222}pre{background:#f7f7f7;padding:10px;border:1px solid #e1e1e1}</style>
</head>
<body>
    <h1><?= esc($message) ?></h1>
    <p><strong>Type:</strong> <?= esc($type) ?> | <strong>Code:</strong> <?= esc($code) ?></p>
    <p><strong>File:</strong> <?= esc($file) ?> <strong>Line:</strong> <?= esc($line) ?></p>

    <h2>Trace</h2>
    <pre><?= esc(print_r($trace, true)) ?></pre>
</body>
</html>
