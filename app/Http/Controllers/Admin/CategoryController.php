<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class CategoryController extends SiteController
{
    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getPaginateCategories();
        $this->setData(compact('categories'));
        if ($categories->currentPage() > $categories->lastPage() ){
            session()->reflash();
            return redirect($categories->previousPageUrl());
        }
        return $this->renderOutput();
    }

    public function create()
    {
        $categories = $this->categoryService->getCategoryTree();
        $this->setData(compact('categories'));
        return $this->renderOutput();
    }

    public function store(CategoryStoreRequest $request)
    {
        $this->categoryService->create($request->validated());
        return redirect()->back()->with('status', 'success');
    }

    public function edit($alias)
    {
        $currentCategory = $this->categoryService->getByAlias($alias);
        $categories = $this->categoryService->getCategoryTreeExcept($alias);
        $this->setData(compact('categories', 'currentCategory'));
        return $this->renderOutput();
    }

    public function update(CategoryUpdateRequest $request, $alias)
    {
        $data = $request->validated();
        if ($this->categoryService->update($alias, $data)){
            return redirect()->route('admin.categories.edit', ['alias' => $data['alias']]);
        }
        return abort(500);
    }

    public function destroy($alias)
    {
        $category = $this->categoryService->getByAlias($alias);
        if ($category->articles->isNotEmpty()){
            return redirect()->back()->withErrors(['not_empty' => 'category is not empty']);
        }
        if (count($this->categoryService->getChildren($category)) > 0){
            return redirect()->back()->withErrors(['has_children' => 'category has children']);
        }
        $this->categoryService->delete($alias);
        return redirect()->back()->with('status', 'success');
    }

    public function createAlias(Request $request)
    {
        if ($request->ajax()){
            $alias = SlugService::createSlug(Category::class, 'alias', $request->title);
            return response()->json(['alias' => $alias]);
        }
        return abort(404);
    }
}
