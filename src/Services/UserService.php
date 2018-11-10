<?php


namespace TestTakersApi\Services;


use TestTakersApi\Models\User;
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
        $usersData = $this->repository->get($request->getLimit(), $request->getOffset(), $request->getFilters());

        $users = [];

        foreach ($usersData as $data) {
            $users[] = new User((array)$data);
        }

        return $users;
    }

    public function firstOrFail(int $userId)
    {
        return new User($this->repository->firstOrFail($userId));
    }
}