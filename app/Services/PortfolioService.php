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

    public function create(array $data, $callback = null)
    {
        if (is_callable($callback)){
            return parent::create($data, $callback);
        }

        return parent::create($data, function ($data) {

            if(request()->has('img')){
                $data['img'] = $this->saveJsonImg();
            }

            $filters = Arr::pull($data, 'filters');
            $related = Arr::pull($data, 'related');

            return DB::transaction(function () use ($data, $filters, $related){
                $portfolio = $this->model->query()->create($data);
                $portfolio->filters()->attach($filters);
                $portfolio->relatedPortfolios()->attach($related);
                return $portfolio;
            }, config('settings.transaction_attempts'));
        });
    }

    public function update(string $alias, array $data, bool $id = false, $callback = null)
    {
        if (is_callable($callback)){
            return parent::update($alias, $data, $id, $callback);
        }

        return parent::update($alias, $data, $id, function ($data, $entity){

            if(request()->has('img')){
                $data['img'] = $this->saveJsonImg();
            }

            $filters = Arr::pull($data, 'filters');
            $related = Arr::pull($data, 'related');

            return DB::transaction(function () use ($data, $entity, $filters, $related){
                $updated = $entity->update($data);
                $entity->filters()->sync($filters);
                $entity->relatedPortfolios()->sync($related);
                return $updated;
            }, config('settings.transaction_attempts'));
        });
    }

    public function delete(string $alias, bool $id = false, $callback = null)
    {
        if (is_callable($callback)){
            return parent::delete($alias, $id,$callback);
        }

        parent::delete($alias, $id, function ($entity){
            DB::transaction(function () use($entity){
                $entity->filters()->detach();
                $entity->relatedPortfolios()->detach();
                return $entity->delete();
            }, config('settings.transaction_attempts'));
        });
    }

}
