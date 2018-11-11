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

        return new self(
            $request->getParam('limit'),
            $request->getParam('offset'),
            $filters
        );
    }

    public function __construct($limit, $offset, array $filters)
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
        return min($this->limit, self::MAX_RECORDS_LIMIT) ?? self::MAX_RECORDS_LIMIT;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return (int)$this->offset;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}