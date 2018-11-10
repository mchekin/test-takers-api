<?php


namespace TestTakersApi\Repositories;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use League\Csv\Exception;
use League\Csv\Reader;
use League\Csv\Statement;

class UserCSVRepository implements UserRepositoryInterface
{
    use PrependIdToRecordTrait;

    private $reader;

    /**
     * @param array $settings
     *
     * @throws Exception
     */
    public function __construct(array $settings)
    {
        $this->reader = Reader::createFromPath($settings['path'], 'r');

        $this->reader->setHeaderOffset(0);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @param array $filters
     *
     * @return array
     *
     * @throws Exception
     */
    public function get(int $limit, int $offset, array $filters): array
    {
        $statement = (new Statement())
            ->offset($offset)
            ->limit($limit);

        foreach ($filters as $key => $value) {
            $statement = $statement->where(function ($record) use ($key, $value) {
                return $record[$key] === $value;
            });
        }

        $records = $statement->process($this->reader);

        $users = iterator_to_array($records->getRecords());

        return $this->prependIds($users);
    }

    /**
     * @param int $userId
     *
     * @return array
     *
     * @throws Exception
     */
    public function firstOrFail(int $userId): array
    {
        $records = (new Statement())->process($this->reader);

        $user = $records->fetchOne($userId - 1);

        if (empty($user)) {
            throw new ModelNotFoundException('User not found with id ' . $userId);
        }

        return $this->prependId($user, $userId);
    }
}