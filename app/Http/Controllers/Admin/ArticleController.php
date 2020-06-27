<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends SiteController
{
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
        parent::__construct();
    }

    public function index()
    {
        $articles = $this->articleService
            ->setRelations(['user', 'category'])
            ->setPaginate(3)
            ->getPaginateArticles();
        $this->data = array_merge($this->data, ['articles' => $articles]);
        return $this->renderOutput();
    }

    public function create()
    {
        return $this->renderOutput();
    }

    public function show(string $alias)
    {
        $article = $this->articleService
            ->setRelations(['user', 'category', 'comments', 'filters'])
            ->getByAlias($alias);
        $this->data = array_merge($this->data, ['article' => $article]);
        return $this->renderOutput();
    }


}
