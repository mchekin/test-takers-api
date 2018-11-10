<?php


namespace TestTakersApi\Repositories;


class UserCSVRepository implements UserRepositoryInterface
{
    /**
     * @var array
     */
    private $settings;

    public function __construct(array $settings)
    {

        $this->settings = $settings;
    }
}