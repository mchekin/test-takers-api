<?php

use Dotenv\Dotenv;
use Slim\App;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv(__DIR__ . '/..');
$dotenv->load();

$settings = require __DIR__ . '/../bootstrap/settings.php';

$app = new App($settings);

require __DIR__ . '/../bootstrap/container.php';
require __DIR__ . '/../bootstrap/routes.php';

$app->run();
