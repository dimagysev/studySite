<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\Filter;
use App\Services\ArticleService;
use App\Services\CategoryService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends SiteController
{
    public function __construct(ArticleService $articleService,
                                CategoryService $categoryService
    )
    {
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
        parent::__construct();
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
        if (!$this->articleService->createArticle($request->validated()) instanceof  Article){
            throw new \Exception('Something wrong', 500);
        }
        return redirect()->back()->with('status', 'success');
    }

    public function edit($alias)
    {
        $article = $this->articleService->setRelations(['user', 'filters', 'category', 'comments'])->getByAlias($alias);
        $categories = $this->categoryService->getCategoryTree();
        $filters = Filter::query()->select('id', 'title')->get();
        $this->setData(compact('categories','filters', 'article'));
        return $this->renderOutput();
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
        $article = $this->articleService->getByAlias($alias);
        $filtersId = $article->filters->pluck('id')->all();
        DB::transaction(function () use($article, $filtersId){
            $article->filters()->detach($filtersId);
            $article->delete();
        },3);
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
