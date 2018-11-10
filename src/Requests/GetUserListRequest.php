<?php


namespace TestTakersApi\Requests;


use Slim\Http\Request;

class GetUserListRequest
{
    public static function fromRequest(Request $request)
    {
        $filters = array_intersect_key($request->getParams(), array_flip([
            'login',
            'title',
            'lastname',
            'firstname',
            'gender',
            'email',
        ]));

        return new self(
            $request->getParam('limit'),
            $request->getParam('offset'),
            $filters
        );
    }

    public function __construct($limit, $offset, array $filters)
    {

    }
}