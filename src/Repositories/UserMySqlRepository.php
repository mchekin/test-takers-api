<?php


namespace TestTakersApi\Repositories;

use Illuminate\Database\Connection;

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
        $usersData =  $this->connection->table('users')
            ->limit($limit)
            ->offset($offset)
            ->where($filters)
            ->get()->toArray();

        return $usersData;
    }
}