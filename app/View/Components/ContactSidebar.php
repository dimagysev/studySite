<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContactSidebar extends Component
{
    /**
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param string $title
     */
    public function __construct($title = '')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.'. config('settings.THEME') .'.build-sidebar.contact-sidebar');
    }
}
