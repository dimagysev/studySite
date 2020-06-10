<?php


namespace App\View\Composers;

use App\Services\MenuService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class MenuComposer
{

    protected $menuService;

    public function __construct(MenuService $menu)
    {
        $this->menuService = $menu;
    }

    public function compose(View $view)
    {
        $menu = $this->menuService->getMenu();
        return $view->with('menu', $menu);
    }


}
