<?php


namespace TestTakersApi\Repositories;

use Illuminate\Database\Connection;
use TestTakersApi\Models\User;

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

        $users = [];

        foreach ($usersData as $data) {
            $users[] = new User((array)$data);
        }

        return $users;
    }
}