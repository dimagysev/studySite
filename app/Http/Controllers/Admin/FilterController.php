<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\FilterStoreRequest;
use App\Http\Requests\FilterUpdateRequest;
use App\Models\Filter;
use App\Services\FilterService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class FilterController extends SiteController
{

    public function __construct(FilterService $filterService)
    {
        parent::__construct();
        $this->filterServices = $filterService;
    }

    public function index()
    {
        $filters = $this->filterServices->getFilters();
        $this->setData(compact('filters'));
        return $this->renderOutput();
    }


    public function create()
    {
        return $this->renderOutput();
    }


    public function store(FilterStoreRequest $request)
    {
        $this->filterServices->create($request->validated());
        return redirect()->back()->with('status', 'success');
    }

    public function edit($alias)
    {
        $filter = $this->filterServices->getByAlias($alias);
        $this->setData(compact('filter'));
        return $this->renderOutput();
    }


    public function update(FilterUpdateRequest $request, $alias)
    {
        $data = $request->validated();
        if ($this->filterServices->update($alias, $data)){
            return redirect()->route('admin.filters.edit', ['alias' => $data['alias']]);
        }
        return abort(500);
    }

    public function destroy($alias)
    {
        $this->filterServices->delete($alias);
        return redirect()->back()->with('status', 'success');
    }

    public function createAlias(Request $request)
    {
        if ($request->ajax()){
            $alias = SlugService::createSlug(Filter::class, 'alias', $request->title);
            return response()->json(['alias' => $alias]);
        }
        return abort(404);
    }
}
