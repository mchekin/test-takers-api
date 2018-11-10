<?php


namespace TestTakersApi\Repositories;


trait PrependIdToRecordTrait
{
    private function prependIds(array $users, int $indexOffset = 0): array
    {
        $keys = array_keys($users);

        return array_map(function ($id) use ($users, $indexOffset) {

            return $this->prependId((array)$users[$id], $id + $indexOffset);

        }, $keys);
    }

    private function prependId(array $user, int $id): array
    {
        return array_merge([
            "id" => $id
        ], $user);
    }
}