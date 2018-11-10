<?php


namespace TestTakersApi\Services;


use TestTakersApi\Repositories\UserRepositoryInterface;
use TestTakersApi\Requests\GetUserListRequest;

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

    public function get(GetUserListRequest $request): array
    {
        return $this->repository->get($request->getLimit(), $request->getOffset(), $request->getFilters());
    }
}