<?php

use Psr\Container\ContainerInterface;
use TestTakersApi\Controllers\UserController;
use TestTakersApi\Repositories\UserMySqlRepository;
use TestTakersApi\Repositories\UserRepositoryInterface;
use TestTakersApi\Services\UserService;

$container = $app->getContainer();

$container[UserRepositoryInterface::class] = function () {
    return new UserMySQLRepository();
};

$container[UserService::class] = function (ContainerInterface $container) {
    return new UserService($container[UserRepositoryInterface::class]);
};

$container[UserController::class] = function (ContainerInterface $container) {
    return new UserController($container[UserService::class]);
};
