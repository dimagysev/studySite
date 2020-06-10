<?php

namespace App\Http\Controllers;


use App\Services\ArticleService;
use App\Services\PortfolioService;
use App\Services\SliderService;

class IndexController extends SiteController
{
    public function __construct(
        SliderService $sliderService,
        PortfolioService $portfolioService,
        ArticleService $articleService
    )
    {
        $this->sliderService = $sliderService;
        $this->portfolioService = $portfolioService;
        $this->articleService = $articleService;
        $this->title = config('settings.home.title');
        $this->metaDescription = config('settings.home.desc');
        $this->metaKeywords = config('settings.home.key');
        $this->sideBar = 'right';
        parent::__construct();
    }

    public function index()
    {
        $slider = $this->sliderService->getSlider();
        $lastPortfolios = $this->portfolioService->getLastPortfolios();
        $lastOnePortfolio = $lastPortfolios->shift();
        $lastArticles = $this->articleService->getSidebar();
        $this->data = array_merge($this->data,[
            'slider' => $slider,
            'lastPortfolios' => $lastPortfolios,
            'lastOnePortfolio' => $lastOnePortfolio,
            'lastArticles' => $lastArticles,
        ]);
        return $this->renderOutput();
    }
}
