<?php


namespace App\Services;


use App\Models\Portfolio;
use App\Traits\Services\GetSidebar;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PortfolioService extends Service
{
    use GetSidebar;

    private $lastPortfoliosCount;

    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
        $this->sidebarCount = config('settings.portfolios.sidebar_count');
        $this->paginate = config('settings.portfolios.paginate');
        $this->lastPortfoliosCount = config('settings.portfolios.last_portfolios_count');
        $this->minHeight = config('settings.portfolios.img_min_height');
        $this->minWidth = config('settings.portfolios.img_min_width');
        $this->maxHeight = config('settings.portfolios.img_max_height');
        $this->maxWidth = config('settings.portfolios.img_max_width');
    }

    public function getPaginatePortfolios()
    {
        return $this->model->query()
            ->with($this->relations)
            ->getOrPaginate($this->paginate);
    }

    public function getLastPortfolios(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->getLast($this->lastPortfoliosCount);
    }

    public function create(array $data)
    {
        $this->image = $data['img'];
        $data['img'] = $this->saveJsonImg();

        $filters = Arr::pull($data, 'filters');
        $related = Arr::pull($data, 'related');

        return DB::transaction(function () use ($data, $filters, $related){
            $portfolio = parent::create($data);
            $portfolio->filters()->attach($filters);
            $portfolio->relatedPortfolios()->attach($related);
            return $portfolio;
        }, config('settings.transaction_attempts'));
    }

    public function update(string $alias, array $data, bool $id = false)
    {
        if(request()->has('img')){
            $this->image = $data['img'];
            $data['img'] = $this->saveJsonImg();
        }

        $filters = Arr::pull($data, 'filters');
        $related = Arr::pull($data, 'related');

        return DB::transaction(function () use ($data, $alias, $id, $filters, $related){
            $portfolio = parent::update($alias, $data, $id);
            $portfolio->filters()->sync($filters);
            $portfolio->relatedPortfolios()->sync($related);
            return $portfolio;
        }, config('settings.transaction_attempts'));
    }

    public function delete(string $alias, bool $id = false, $callback = null)
    {
        if (is_callable($callback)){
            return parent::delete($alias, $id,$callback);
        }

        parent::delete($alias, $id, function ($entity){
            DB::transaction(function () use($entity){
                $entity->filters()->detach();
                return $entity->delete();
            }, config('settings.transaction_attempts'));
        });
    }

}
