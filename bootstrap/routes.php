<?php


use TestTakersApi\Controllers\UserController;

$app->group('/v1', function () {
    $this->get('/users', UserController::class . ':index');
    $this->get('/users/{userId}', UserController::class . ':show');
});