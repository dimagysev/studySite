<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\ProfileUpdateRequest;
use App\Services\UserService;

class ProfileController extends SiteController
{


    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        parent::__construct();
    }

    public function edit()
    {
        $currentUser = auth()->user();
        $this->setData(compact('currentUser'));
        return $this->renderOutput();
    }

    public function update(ProfileUpdateRequest $request)
    {
       if ($this->userService->update(auth()->id(), $request->validated(), true)){
           return redirect()->back()->with('status', 'success');
       }
    }

}
