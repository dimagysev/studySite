<?php


namespace App\Services;


use App\Models\Article;
use App\Traits\Services\GetSidebar;
use App\Traits\Services\StoreImages;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ArticleService extends Service
{
    use GetSidebar, StoreImages;

    public function __construct(Article $article)
    {
        $this->model = $article;
        $this->sidebarCount = config('settings.articles.sidebar_count');
        $this->paginate = config('settings.articles.paginate');
        $this->minHeight = $this->minWidth = 55;
        $this->maxHeight = 282;
        $this->maxWidth = 816;
    }

    public function getPaginateArticles(string $category = null)
    {
        return $category
            ? $this->getArticlesByCategory($category, $this->paginate)
            : $this->getArticles($this->paginate);
    }

    public function getArticles( ?int $perPage)
    {
        return $this->model::query()
            ->with($this->relations)
            ->getOrPaginate($perPage);
    }

    public function getArticlesByCategory(string $category, ?int $perPage)
    {
        return $this->model::query()
            ->with($this->relations)
            ->whereHas('category', function (Builder $query) use($category){
                $query->where('alias', $category);
            })
            ->getOrPaginate($perPage);
    }

    public function createArticle(array $data)
    {
        $this->image = $data['img'];
        $filters = Arr::pull($data, 'filters');
        $data['img'] = json_encode([
            'mini'  => $this->storeMin(),
            'max'   => $this->storeMax(),
            'path'  => $this->storeOriginal()
        ]);
        $data['user_id'] = auth()->id();
        return DB::transaction(function () use ($data, $filters){
            $article = $this->model::query()->create($data);
            $article->filters()->attach($filters);
            return $article;
        }, 3);
    }
}
