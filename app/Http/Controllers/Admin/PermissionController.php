<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\PermissionStoreRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Services\PermissionService;

class PermissionController extends SiteController
{

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
        parent::__construct();
    }

    public function index()
    {
        $permissions = $this->permissionService->getPermissions();
        $this->setData(compact('permissions'));
        return $this->renderOutput();
    }

    public function create()
    {
        return $this->renderOutput();
    }

    public function store(PermissionStoreRequest $request)
    {
        $this->permissionService->create($request->validated());
        return redirect()->back()->with('status', 'success');
    }

    public function edit($id)
    {
        $permission = $this->permissionService->getById($id);
        $this->setData(compact('permission'));
        return $this->renderOutput();
    }

    public function update(PermissionUpdateRequest $request, $id)
    {
        if ($this->permissionService->update($id, $request->validated(), true)){
            return redirect()->back()->with('status', 'success');
        }
        return abort(500);
    }

    public function destroy($id)
    {
        $this->permissionService->delete($id, true);
        return redirect()->back()->with('status', 'success');
    }
}
