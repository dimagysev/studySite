<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService extends Service
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getUsers()
    {
        return $this->model::query()->where('id' , '<>', auth()->id())->get();
    }

    public function create(array $data, callable $callback = null)
    {
        $data['password'] = Hash::make($data['password']);
        return parent::create($data, $callback);
    }

    public function update(string $alias, array $data, bool $id = false, callable $callback = null)
    {
        if (isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }
        return parent::update($alias, $data, $id, $callback);
    }

}
