<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\PortfolioStoreRequest;
use App\Http\Requests\PortfolioUpdateRequest;
use App\Models\Filter;
use App\Models\Portfolio;
use App\Services\PortfolioService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Http\Resources\Portfolio as PortfolioResource;


class PortfolioController extends SiteController
{
    public function __construct(PortfolioService $portfolioService)
    {
        $this->portfolioService = $portfolioService;
        parent::__construct();
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
        $filters = Filter::all('id', 'title');
        $this->setData(compact('filters'));
        return $this->renderOutput();
    }

    public function store(PortfolioStoreRequest $request)
    {
        if (!$this->portfolioService->create($request->validated()) instanceof  Portfolio){
            throw new \Exception('Something wrong', 500);
        }
        return redirect()->back()->with('status', 'success');
    }

    public function show($alias)
    {
        $portfolio = $this->portfolioService
            ->setRelations(['filters', 'relatedPortfolios'])
            ->getByAlias($alias);
        $this->setData(compact('portfolio'));
        return $this->renderOutput();
    }

    public function edit($alias)
    {
        $portfolio = $this->portfolioService->setRelations(['relatedPortfolios'])->getByAlias($alias);
        $portfolio->filtersId = $portfolio->filters()->pluck('id')->toArray();
        $filters = Filter::all('id', 'title');
        $this->setData(compact('portfolio', 'filters'));
        return $this->renderOutput();
    }

    public function update(PortfolioUpdateRequest $request, $alias)
    {
        if ($this->portfolioService->update($alias, $request->validated())){
            return redirect()
                ->route('admin.portfolios.edit', ['alias'=>$request->alias])
                ->with('status', 'ok');
        }
        return abort(500);
    }

    public function destroy($alias)
    {
        $this->portfolioService->delete($alias);
        return redirect()->back()->with('status','ok');
    }

    public function createAlias(Request $request)
    {
        if ($request->ajax()){
            $alias = SlugService::createSlug(Portfolio::class, 'alias', $request->title);
            return response()->json(['alias' => $alias]);
        }
        return abort(404);
    }

    public function related(Request $request)
    {
        if ($request->ajax()){
            $related = Portfolio::query()
                ->select('id', 'title', 'img')
                ->where('title', 'like', '%' . $request->query('q') . '%')
                ->when($request->alias, function ($query, $alias){
                    return $query->where('alias', '<>', $alias);
                })->get();
            return PortfolioResource::collection($related);
        }
        return abort(404);
    }
}
