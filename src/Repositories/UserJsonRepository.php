<?php


namespace TestTakersApi\Repositories;


use ArrayIterator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserJsonRepository implements UserRepositoryInterface
{
    use PrependIdToRecordTrait;
    use FilterRecordsTrait;

    /**
     * @var string
     */
    private $path;

    public function __construct(array $settings)
    {
        $this->path = $settings['path'];
    }

    public function get(int $limit, int $offset, array $filters): array
    {
        $usersData = json_decode(file_get_contents($this->path), true);

        $usersIterator = new ArrayIterator($usersData);

        $usersIterator = $this->filterMany($usersIterator, $filters);

        $users = iterator_to_array($usersIterator);

        $users = array_slice($users, $offset, $limit, true);

        return $this->prependIds($users, 1);
    }

    public function firstOrFail(int $userId): array
    {
        $usersData = json_decode(file_get_contents($this->path), true);

        $user = $usersData[$userId-1] ?? null;

        if (empty($user)) {
            throw new ModelNotFoundException('User not found with id ' . $userId);
        }

        return $this->prependId($user, $userId);
    }
}