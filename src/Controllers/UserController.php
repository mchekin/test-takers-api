<?php


namespace TestTakersApi\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;
use TestTakersApi\Requests\GetUserListRequest;
use TestTakersApi\Requests\GetUserRequest;
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
        $users = $this->service->get(GetUserListRequest::fromRequest($request));

        return $response->withStatus(200)->withJson($users);
    }

    public function show(Request $request, Response $response)
    {
        $users = $this->service->firstOrFail(GetUserRequest::fromRequest($request));

        return $response->withStatus(200)->withJson($users);
    }
}