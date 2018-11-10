<?php


namespace TestTakersApi\Repositories;


use Generator;
use Traversable;

trait FilterRecordsTrait
{
     private function filterMany(Traversable $users, array $filters): Generator
    {
        foreach ($users as $key => $value) {
            if ($this->filter($value, $filters)) {
                yield $key => $value;
            }
        }
    }

    private function filter(array $user, array $filters): bool
    {
        foreach ($filters as $key => $filterValue) {
            if ($user[$key] !== $filterValue) {
                return false;
            }
        }

        return true;
    }
}