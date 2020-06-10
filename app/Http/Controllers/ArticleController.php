<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\CommentService;
use App\Services\PortfolioService;

class ArticleController extends SiteController
{
    public function __construct(ArticleService $articleService,
                                PortfolioService $portfolioService,
                                CommentService $commentService
    )
    {
        $this->articleService = $articleService;
        $this->portfolioService = $portfolioService;
        $this->commentService = $commentService;
        $this->sideBar = 'right';
        $this->title = config('settings.articles.title');
        $this->metaDescription = config('settings.articles.desc');
        $this->metaKeywords = config('settings.articles.key');

        $this->data['portfoliosSidebar'] = $this->portfolioService->getSidebar();
        $this->data['commentsSidebar'] = $this->commentService->getSidebar();
        parent::__construct();

    }

    public function index($category = null)
    {
        $this->routeName = 'articles.index';
        $articles = $this->articleService->getPaginateArticles($category);
        $this->data = array_merge($this->data, [
            'articles' => $articles
        ]);
        return $this->renderOutput();
    }

    public function show($alias)
    {
        $article = $this->articleService->getByAlias($alias);
        $this->articleService->loadRelations($article);
        $comments = $this->commentService->getCommentsByArticle($article);
        $this->title = $article->title;
        $this->metaDescription = $article->meta_desc;
        $this->metaKeywords = $article->meta_key;
        $this->data = array_merge($this->data, [
            'article' => $article,
            'comments' => $comments
        ]);
        return $this->renderOutput();
    }
}
