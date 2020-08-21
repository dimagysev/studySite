<?php


namespace App\Services;


use App\Models\Article;
use App\Traits\Services\GetSidebar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ArticleService extends Service
{
    use GetSidebar;

    public function __construct(Article $article)
    {
        $this->model = $article;
        $this->sidebarCount = config('settings.articles.sidebar_count');
        $this->paginate = config('settings.articles.paginate');
        $this->minHeight = config('settings.articles.img_min_height');
        $this->minWidth = config('settings.articles.img_min_width');
        $this->maxHeight = config('settings.articles.img_max_height');
        $this->maxWidth = config('settings.articles.img_max_width');
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

    public function create(array $data)
    {
        $this->image = $data['img'];
        $data['img'] = $this->saveJsonImg();
        $filters = Arr::pull($data, 'filters');

        return DB::transaction(function () use ($data, $filters){
            $article = parent::create($data);
            $article->filters()->attach($filters);
            return $article;
        }, config('settings.transaction_attempts'));
    }

    public function update(string $alias, array $data, bool $id = false)
    {
        if (request()->has('img')){
            $this->image = $data['img'];
            $data['img'] = $this->saveJsonImg();
        }

        $filters = Arr::pull($data, 'filters');

        return DB::transaction(function () use ($data, $alias, $id, $filters){
            $article = parent::update($alias, $data, $id);
            $article->filters()->sync($filters);
            return $article;
        }, config('settings.transaction_attempts'));
    }

    public function delete(string $alias, bool $id = false, callable $callback = null)
    {
        if (is_callable($callback)){
            return parent::delete($alias, $id ,$callback);
        }

        parent::delete($alias, $id, function ($entity){
            DB::transaction(function () use($entity){
                $entity->filters()->detach();
                return $entity->delete();
            }, config('settings.transaction_attempts'));
        });
    }

}
