<?php


namespace App\Services;


use App\Models\Menu;
use App\Traits\Services\BuildTree;
use Illuminate\Database\Eloquent\Collection;

class MenuService extends Service
{
    use BuildTree;

    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }

    public function getMenu()
    {
        $menu = $this->model->query()->get();
        return $menu ? $this->buildTree($menu, 'parent') : $menu;
    }
}
