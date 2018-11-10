<?php


namespace TestTakersApi\Repositories;


use Illuminate\Database\Capsule\Manager;

class UserMySqlRepository implements UserRepositoryInterface
{
    /**
     * @var Manager
     */
    private $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }
}