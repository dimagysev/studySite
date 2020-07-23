<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Filter;
use App\Services\ArticleService;
use App\Services\CategoryService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ArticleController extends SiteController
{
    public function __construct(ArticleService $articleService,
                                CategoryService $categoryService
    )
    {
        parent::__construct();
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $articles = $this->articleService
            ->setRelations(['user', 'category'])
            ->setPaginate(3)
            ->getPaginateArticles();
        $this->setData(compact('articles'));

        if ($articles->currentPage() > $articles->lastPage() ){
            session()->reflash();
            return redirect($articles->previousPageUrl());
        }
        return $this->renderOutput();
    }

    public function create()
    {
        $categories = $this->categoryService->getCategoryTree();
        $filters = Filter::query()->select('id', 'title')->get();
        $this->setData(compact('categories','filters'));
        return $this->renderOutput();
    }

    public function store(ArticleStoreRequest $request)
    {
        if (!$this->articleService->create($request->validated()) instanceof  Article){
            throw new \Exception('Something wrong', 500);
        }
        return redirect()->back()->with('status', 'success');
    }

    public function edit($alias)
    {
        $article = $this->articleService->setRelations(['user', 'category', 'comments'])->getByAlias($alias);
        $article->filtersId = $article->filters()->pluck('id')->toArray();
        $categories = $this->categoryService->getCategoryTree();
        $filters = Filter::query()->select('id', 'title')->get();
        $this->setData(compact('categories','filters', 'article'));
        return $this->renderOutput();
    }

    public function update(ArticleUpdateRequest $request, $alias)
    {
        if ($this->articleService->update($alias, $request->validated())){
            return redirect()
                ->route('admin.articles.edit', ['alias'=>$request->alias])
                ->with('status', 'ok');
        }
        return abort(500);
    }

    public function show(string $alias)
    {
        $article = $this->articleService
            ->setRelations(['user', 'category', 'comments', 'filters'])
            ->getByAlias($alias);
        $this->setData(compact('article'));
        return $this->renderOutput();
    }

    public function destroy($alias)
    {
        $this->articleService->delete($alias);
        return redirect()->back()->with('status','ok');
    }

    public function createAlias(Request $request)
    {
        if ($request->ajax()){
            $alias = SlugService::createSlug(Article::class, 'alias', $request->title);
            return response()->json(['alias' => $alias]);
        }
        return abort(404);
    }
}
