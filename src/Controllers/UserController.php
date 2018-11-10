<?php


namespace TestTakersApi\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;
use TestTakersApi\Requests\GetUserListRequest;
use TestTakersApi\Services\UserService;

class UserController
{
    /**
     * @var UserService
     */
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, Response $response)
    {
        $this->service->get(GetUserListRequest::fromRequest($request));

        $users = [];

        return $response->withStatus(200)->withJson($users);
    }
}