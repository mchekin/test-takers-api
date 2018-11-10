<?php


namespace TestTakersApi\Repositories;


interface UserRepositoryInterface
{
    public function get(int $limit, int $offset, array $filters): array;

    public function firstOrFail(int $userId): array;
}