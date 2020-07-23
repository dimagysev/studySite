<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

abstract class SiteController extends Controller
{
    protected $portfolioService;
    protected $sliderService;
    protected $articleService;
    protected $commentService;
    protected $categoryService;
    protected $filterService;
    protected $userService;
    protected $routeName;

    protected $template = '';
    protected $sideBar = 'no';
    protected $data = [];
    protected $title ;
    protected $metaDescription;
    protected $metaKeywords;

    public function __construct()
    {
        $this->routeName = Route::getCurrentRoute()->getName();
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function renderOutput()
    {
        $this->data['sideBar'] = $this->sideBar;
        $this->data['meteDescription'] = $this->metaDescription;
        $this->data['metaKeywords'] = $this->metaKeywords;
        $this->data['title'] = $this->title;
        $this->data['routeName'] = $this->routeName;
        $this->template = config('settings.THEME').'.'.$this->routeName;
        return view($this->template, $this->data);
    }

    protected function setData(array $data)
    {
        $this->data = array_merge($this->data, $data);
    }

}
