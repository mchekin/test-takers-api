<?php


namespace TestTakersApi\Requests;


use Slim\Http\Request;

class GetUserListRequest
{
    const MAX_RECORDS_LIMIT = 100;

    const ALLOWED_FILTERS = [
        'login',
        'title',
        'lastname',
        'firstname',
        'gender',
        'email',
    ];

    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $offset;

    /**
     * @var array
     */
    private $filters;

    public static function fromRequest(Request $request)
    {
        $filters = array_intersect_key($request->getParams(), array_flip(self::ALLOWED_FILTERS));

        $restrictedLimit = min($request->getParam('limit'), self::MAX_RECORDS_LIMIT);
        $limit = $restrictedLimit ?? self::MAX_RECORDS_LIMIT;

        $offset = max($request->getParam('offset'), 0);

        return new self((int)$limit, (int)$offset, $filters);
    }

    private function __construct(int $limit, int $offset, array $filters)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        $this->filters = $filters;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}