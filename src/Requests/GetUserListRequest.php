<?php


namespace TestTakersApi\Requests;


use Slim\Http\Request;

class GetUserListRequest
{
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

    const ALLOWED_FILTERS = [
        'login',
        'title',
        'lastname',
        'firstname',
        'gender',
        'email',
    ];

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