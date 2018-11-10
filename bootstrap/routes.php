<?php


use TestTakersApi\Controllers\UserController;

$app->group('/v1', function () {
    $this->get('/users', UserController::class . ':index');
});