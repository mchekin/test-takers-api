<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App();

require __DIR__ . '/../bootstrap/container.php';
require __DIR__ . '/../bootstrap/routes.php';

$app->run();
