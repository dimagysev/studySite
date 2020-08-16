<?php


namespace App\Services;


use App\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RoleService extends Service
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function getRoles()
    {
        return $this->model::all();
    }

    public function create(array $data, callable $callback = null)
    {

        if (is_callable($callback)){
            return parent::create($data, $callback);
        }

        return parent::create($data, function ($data) {

            $permissions = Arr::pull($data, 'permissions');

            return DB::transaction(function () use ($data, $permissions){
                $role = $this->model::query()->create($data);
                $role->permissions()->attach($permissions);
                return $role;
            }, config('settings.transaction_attempts'));
        });
    }

    public function update(string $alias, array $data, bool $id = false, callable $callback = null)
    {
        if (is_callable($callback)){
            return parent::update($alias, $data, $id, $callback);
        }

        return parent::update($alias, $data, $id, function ($data, $entity) {

            $permissions = Arr::pull($data, 'permissions');

            return DB::transaction(function () use ($data, $entity, $permissions){
                $entity->update($data);
                $entity->permissions()->sync($permissions);
                return $entity;
            }, config('settings.transaction_attempts'));
        });
    }
}
