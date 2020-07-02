<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use App\Services\PortfolioService;
use Illuminate\Http\Request;

class PortfolioController extends SiteController
{
    public function __construct(PortfolioService $portfolioService)
    {
        parent::__construct();
        $this->portfolioService = $portfolioService;
    }

    public function index()
    {
        $portfolios = $this->portfolioService->getPaginatePortfolios();
        $this->setData(compact('portfolios'));
        if ($portfolios->currentPage() > $portfolios->lastPage() ){
            session()->reflash();
            return redirect($portfolios->previousPageUrl());
        }
        return $this->renderOutput();
    }


    public function create()
    {

    }

    public function store(Request $request)
    {
        return __METHOD__;
    }

    public function show($alias)
    {
        return __METHOD__;
    }

    public function edit($alias)
    {
        return __METHOD__;
    }

    public function update(Request $request, $alias)
    {
        return __METHOD__;
    }

    public function destroy($alias)
    {
        return __METHOD__;
    }
}
