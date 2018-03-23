<?php

declare(strict_types = 1);

$scriptPath = base_path('bin/deploy.sh');

if (file_exists($scriptPath)) {
    exec('chmod +x ' . $scriptPath);
    exec('sh ' . $scriptPath . " > /dev/null &");
}
