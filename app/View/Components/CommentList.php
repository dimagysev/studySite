<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommentList extends Component
{
    public $comments;

    /**
     * Create a new component instance.
     *
     * @param $comments
     */
    public function __construct($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.pinc.build-comments-list.comment-list');
    }
}
