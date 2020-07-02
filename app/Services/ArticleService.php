<?php


namespace App\Services;


use App\Models\Article;
use App\Traits\Services\Crud;
use App\Traits\Services\GetSidebar;
use App\Traits\Services\StoreImages;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ArticleService extends Service
{
    use GetSidebar/*, StoreImages*/, Crud;

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

    /*    public function createArticle(array $data)
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
            }, config('settings.transaction_attempts'));
        }

        public function updateArticle(string $alias, array $data)
        {
            if (request()->has('img')){
                $this->image = $data['img'];
                $data['img'] = json_encode([
                    'mini'  => $this->storeMin(),
                    'max'   => $this->storeMax(),
                    'path'  => $this->storeOriginal()
                ]);
            }
            $filters = Arr::pull($data, 'filters');
            $article = $this->getByAlias($alias);
            return DB::transaction(function () use ($data, $article, $filters){
                $updated = $article->update($data);
                $article->filters()->sync($filters);
                return $updated;
            }, config('settings.transaction_attempts'));
        }

        public function deleteArticle($alias)
        {
            $article = $this->getByAlias($alias);
            $filtersId = $article->filters->pluck('id')->all();
            DB::transaction(function () use($article, $filtersId){
                $article->filters()->detach($filtersId);
                return $article->delete();
            }, config('settings.transaction_attempts'));
        }*/
}
