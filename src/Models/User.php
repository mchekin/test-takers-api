<?php


namespace TestTakersApi\Models;


use JsonSerializable;

class User implements JsonSerializable
{
    /**
     * @var array
     */
    private $data;

    const ALLOWED_OUTPUT_FIELDS = [
        'id',
        'login',
        'title',
        'lastname',
        'firstname',
        'gender',
        'email',
        'picture',
        'address',
    ];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function jsonSerialize()
    {
        return array_intersect_key($this->data, array_flip(self::ALLOWED_OUTPUT_FIELDS));
    }
}