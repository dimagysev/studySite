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
        $this->setData(compact('slider', 'lastPortfolios', 'lastOnePortfolio','lastArticles'));
        return $this->renderOutput();
    }

    /*public function getModels($modelDirectory = 'Models')
    {
        $files = collect(File::allFiles(app_path($modelDirectory)));
        $modelDirectory .= '\\';
        return $files
            ->map(function ($item) use($modelDirectory){
                return 'App\\' . $modelDirectory . explode('.', $item->getFileName())[0];
            })
            ->filter(function ($item){
                if (class_exists($item)){
                    $reflaction = new \ReflectionClass($item);
                    return $reflaction->getParentClass()->getName() === 'Illuminate\\Database\\Eloquent\\Model'
                        || 'Illuminate\\Foundation\\Auth\\User';
                }
                return false;
            });
    }*/


}
