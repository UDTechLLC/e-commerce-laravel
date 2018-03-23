<?php

declare(strict_types = 1);

$scriptPath = __DIR__ . '/bin/deploy.sh';

if (file_exists($scriptPath)) {
    exec('chmod +x ' . $scriptPath);
    exec('sh ' . $scriptPath . " > /dev/null &");
}
