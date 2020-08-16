<?php


namespace App\Services;


use App\Models\Permission;

class PermissionService extends Service
{
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function getPermissions()
    {
        return $this->model::all();
    }
}
