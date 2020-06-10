<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommentSidebar extends Component
{
    public $collection;

    public $title;

    /**
     * Create a new component instance.
     *
     * @param $collection
     * @param string $title
     */
    public function __construct($collection = null, $title = '')
    {
        //
        $this->collection = $collection;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.' . config('settings.THEME') . '.build-sidebar.comment-sidebar');
    }
}
