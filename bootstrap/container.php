<?php

use Illuminate\Database\Capsule\Manager;
use Psr\Container\ContainerInterface;
use TestTakersApi\Controllers\UserController;
use TestTakersApi\Repositories\UserCSVRepository;
use TestTakersApi\Repositories\UserJsonRepository;
use TestTakersApi\Repositories\UserMySqlRepository;
use TestTakersApi\Repositories\UserRepositoryInterface;
use TestTakersApi\Services\UserService;

$container = $app->getContainer();

$container[Manager::class] = function (ContainerInterface $container) {


};

$container[UserRepositoryInterface::class] = function (ContainerInterface $container) {

    switch ($container->get('settings')['db']['default'])
    {
        case 'csv':
            return $container[UserCSVRepository::class];
        case 'json':
            return $container[UserJsonRepository::class];
        default:
            return $container[UserMySqlRepository::class];
    }
};

$container[UserMySqlRepository::class] = function (ContainerInterface $container) {

    $manager = new Manager();

    $manager->addConnection($container->get('settings')['db']['mysql']);
    $manager->bootEloquent();

    return new UserMySqlRepository($manager->getConnection());
};

$container[UserCSVRepository::class] = function (ContainerInterface $container) {

    return new UserCSVRepository($container->get('settings')['db']['csv']);
};

$container[UserJsonRepository::class] = function (ContainerInterface $container) {

    return new UserJsonRepository($container->get('settings')['db']['json']);
};

$container[UserService::class] = function (ContainerInterface $container) {
    return new UserService($container[UserRepositoryInterface::class]);
};

$container[UserController::class] = function (ContainerInterface $container) {
    return new UserController($container[UserService::class]);
};
