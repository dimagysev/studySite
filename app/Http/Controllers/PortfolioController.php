<?php

namespace App\Http\Controllers;

use App\Services\PortfolioService;

class PortfolioController extends SiteController
{
    public function __construct(PortfolioService $portfolioService)
    {
        $this->portfolioService = $portfolioService;
        $this->sideBar = 'no';
        $this->title = config('settings.portfolios.title');
        $this->metaDescription = config('settings.portfolios.desc');
        $this->metaKeywords = config('settings.portfolios.key');
        parent::__construct();
    }

    public function index()
    {
        $portfolios = $this->portfolioService->getPaginatePortfolios();
        $this->data = array_merge($this->data, ['portfolios' => $portfolios]);
        return $this->renderOutput();
    }

    public function show($alias)
    {
        $this->template = config('settings.THEME').'.portfolio-show';
        $portfolio = $this->portfolioService->getByAlias($alias);
        $otherPortfolios =$portfolio->relatedPortfolios;
        $this->title = $portfolio->title;
        $this->metaKeywords = $portfolio->meta_key;
        $this->metaDescription = $portfolio->meta_desc;
        $this->data = array_merge($this->data, [
            'portfolio' => $portfolio,
            'otherPortfolios' => $otherPortfolios
        ]);
        return $this->renderOutput();
    }
}
