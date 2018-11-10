<?php


namespace TestTakersApi\Services;


use TestTakersApi\Repositories\UserRepositoryInterface;

class UserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}