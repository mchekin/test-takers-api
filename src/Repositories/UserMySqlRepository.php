<?php


namespace TestTakersApi\Repositories;

use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserMySqlRepository implements UserRepositoryInterface
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function get(int $limit, int $offset, array $filters): array
    {
        return $this->connection->table('users')
            ->orderBy('id')
            ->limit($limit)
            ->offset($offset)
            ->where($filters)
            ->get()->toArray();
    }

    /**
     * @param int $userId
     * @return array
     *
     * @throws ModelNotFoundException
     */
    public function firstOrFail(int $userId): array
    {
        $user = $this->connection->table('users')->find($userId);

        if($user === null)
        {
            throw new ModelNotFoundException('User not found with id '. $userId);
        }

        return (array)$user;
    }
}