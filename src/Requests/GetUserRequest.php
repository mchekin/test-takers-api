<?php


namespace TestTakersApi\Requests;


use InvalidArgumentException;
use Slim\Http\Request;

class GetUserRequest
{
    /**
     * @var int
     */
    private $userId;

    public static function fromRequest(Request $request)
    {
        $userId = $request->getAttribute('userId');

        if (!is_numeric($userId) || $userId < 1) {
            throw new InvalidArgumentException("User id must be a positive integer");
        }

        return new self((int)$userId);
    }

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }
}