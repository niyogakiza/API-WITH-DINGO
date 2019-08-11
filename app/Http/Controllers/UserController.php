<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Transformers\UserTransformer;
use App\Models\User;
use App\Services\UserService;
use Dingo\Api\Http\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return Response
     */

    public function index()
    {
        $users = User::all();

        return $this->response->collection($users, new UserTransformer());
    }

    public function store(UserCreateRequest $request)
    {
        $user = $this->userService->create($request->all());

        return $this->response->item($user, new UserTransformer());
    }

    public function show($id)
    {
        $user = $this->userService->find($id);

        return $this->response->item($user, new UserTransformer());
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = $this->userService->find($id);
        $user = $this->userService->update($user, $request->all());

        return $this->response->item($user, new UserTransformer());
    }

    public function destroy($id)
    {
        $user = $this->userService->find($id);
        $this->userService->delete($user);

        return $this->success();

    }
}
