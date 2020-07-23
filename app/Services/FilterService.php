<?php


namespace App\Services;


use App\Models\Filter;
use Illuminate\Support\Facades\DB;

class FilterService extends Service
{
    public function __construct(Filter $filter)
    {
        $this->model = $filter;
        $this->paginate = config('settings.filters.paginate');
    }

    public function getFilters()
    {
        return $this->model::all();
    }

    public function getPaginateFilters()
    {
        return $this->model::query()->getOrPaginate($this->paginate);
    }

    public function delete(string $alias, $id = false, callable  $callback = null)
    {
        if (is_callable($callback)){
            return parent::delete($alias, $id, $callback);
        }

        return parent::delete($alias, $id, function (Filter $entity){
            return DB::transaction(function () use ($entity){
                if ($entity->articles->isNotEmpty()){
                    $entity->articles()->detach();
                }
                if ($entity->portfolios->isNotEmpty()){
                    $entity->portfolios()->detach();
                }
                return $entity->delete();
            }, config('settings.transaction_attempts'));
        });
    }

}
