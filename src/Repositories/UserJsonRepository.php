<?php


namespace TestTakersApi\Repositories;


class UserJsonRepository implements UserRepositoryInterface
{
    /**
     * @var array
     */
    private $settings;

    public function __construct(array $settings)
    {

        $this->settings = $settings;
    }

    public function get(int $limit, int $offset, array $filters): array
    {
        // TODO: Implement get() method.
        return [];
    }
}