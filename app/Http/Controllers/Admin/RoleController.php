<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends SiteController
{

    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
        parent::__construct();
    }

    public function index()
    {
        $roles = $this->roleService->getRoles();
        $this->setData(compact('roles'));
        return $this->renderOutput();
    }


    public function create()
    {
        $permissions = $this->permissionService->getPermissions();
        $this->setData(compact('permissions'));
        return $this->renderOutput();
    }


    public function store(RoleStoreRequest $request)
    {
        $this->roleService->create($request->validated());
        return redirect()->back()->with('status', 'success');
    }


    public function edit($id)
    {
        $role = $this->roleService->getById($id);
        $role->permissionsId = $role->permissions->pluck('id')->toArray();
        $permissions = $this->permissionService->getPermissions();
        $this->setData(compact('role', 'permissions'));
        return $this->renderOutput();
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        if ($this->roleService->update($id, $request->validated(), true)){
            return redirect()->back()->with('status', 'success');
        }
        return abort(500);
    }

    public function destroy($id)
    {
        $this->roleService->delete($id, true);
        return redirect()->back()->with('status', 'success');
    }
}
