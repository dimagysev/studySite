<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Models\Article;
use App\Models\Filter;
use App\Models\Menu;
use App\Models\Portfolio;
use App\Models\Slider;
use App\Models\User;

class IndexController extends SiteController
{
    public function index()
    {
        $userCount = User::query()->count();
        $menuCount = Menu::query()->count();
        $articlesCount = Article::query()->count();
        $portfoliosCount = Portfolio::query()->count();
        $filtersCount = Filter::query()->count();
        $sliderCount = Slider::query()->count();
        $this->data = array_merge($this->data, [
            'userCount'      => $userCount,
            'menuCount'      => $menuCount,
            'articlesCount'   => $articlesCount,
            'portfoliosCount' => $portfoliosCount,
            'filtersCount'   => $filtersCount,
            'sliderCount'    => $sliderCount
        ]);
        return $this->renderOutput();
    }
}
