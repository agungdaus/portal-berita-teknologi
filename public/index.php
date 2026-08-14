<?php

declare(strict_types=1);

$minPhpVersion = '8.1';
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo sprintf('PHP %s+ required. Current: %s', $minPhpVersion, PHP_VERSION);
    exit(1);
}

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

// Load composer autoloader
define('COMPOSER_PATH', FCPATH . '../vendor/autoload.php');
require COMPOSER_PATH;

require FCPATH . '../app/Config/Paths.php';

$paths = new Config\Paths();

require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'Boot.php';

exit(CodeIgniter\Boot::bootWeb($paths));
