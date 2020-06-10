<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public $title = '';
    public $collection = null;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $type
     * @param $collection
     */
    public function __construct($title, $collection = null)
    {
        $this->title = $title;
        $this->collection = $collection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.'.env('THEME').'.build-sidebar.sidebar');
    }
}
