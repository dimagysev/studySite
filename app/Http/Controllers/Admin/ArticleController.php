<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Models\Category;
use App\Models\Filter;
use App\Services\ArticleService;
use App\Services\CategoryService;
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

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show(string $alias)
    {
        $article = $this->articleService
            ->setRelations(['user', 'category', 'comments', 'filters'])
            ->getByAlias($alias);
        $this->setData(compact('article'));
        return $this->renderOutput();
    }


}
