<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $menu;



    public function __construct($menu)
    {
        $this->menu = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.' . env("THEME") . '.build-menu.menu');
    }

    public function buildMenu($menu)
    {
        return view('components.' . env("THEME") . '.build-menu.item', ['menu'=>$menu])->render();
    }
}
