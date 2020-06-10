<?php


namespace App\Services;


use App\Models\Article;
use App\Traits\Services\GetSidebar;
use Illuminate\Database\Eloquent\Builder;

class ArticleService extends Service
{
    use GetSidebar;

    protected const RELATIONS = ['filters', 'user', 'comments', 'category'];

    public function __construct(Article $article)
    {
        $this->model = $article;
        $this->sidebarCount = config('settings.articles.sidebar_count');
        $this->paginate = config('settings.articles.paginate');
    }

    public function getPaginateArticles(string $category = null)
    {
        return $category
            ? $this->getArticlesByCategory($category, $this->paginate)
            : $this->getArticles($this->paginate);
    }

    public function getArticles($perPage = false)
    {
        return $this->model::query()
            ->with(self::RELATIONS)
            ->getOrPaginate($perPage);
    }

    public function getArticlesByCategory($category, $perPage = false)
    {
        return $this->model::query()
            ->with(self::RELATIONS)
            ->whereHas('category', function (Builder $query) use($category){
                $query->where('alias', $category);
            })
            ->getOrPaginate($perPage);
    }
}
