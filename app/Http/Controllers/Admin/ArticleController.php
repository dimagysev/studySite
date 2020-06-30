<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\Category;
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

    public function show(string $alias)
    {
        $article = $this->articleService
            ->setRelations(['user', 'category', 'comments', 'filters'])
            ->getByAlias($alias);
        $this->setData(compact('article'));
        return $this->renderOutput();
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
