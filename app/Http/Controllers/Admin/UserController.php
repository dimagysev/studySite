<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;

class UserController extends SiteController
{

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        parent::__construct();
    }

    public function index()
    {
        $users = $this->userService->getUsers();
        $this->setData(compact('users'));
        return $this->renderOutput();
    }

    public function create()
    {
        return $this->renderOutput();
    }

    public function store(UserStoreRequest $request)
    {
        $this->userService->create($request->validated());
        return redirect()->back()->with('status', 'success');
    }

    public function edit($id)
    {
        $user = $this->userService->getById($id);
        $this->setData(compact('user'));
        return $this->renderOutput();
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($this->userService->update($id, $data, true)){
            return redirect()->back()->with('status', 'success');
        }
        return abort(500);
    }

    public function destroy($id)
    {
        $this->userService->delete($id, true);
        return redirect()->back()->with('status', 'success');
    }
}
