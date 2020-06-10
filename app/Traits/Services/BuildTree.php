<?php


namespace App\Traits\Services;


use Illuminate\Database\Eloquent\Collection;

trait BuildTree
{
    protected function buildTree(Collection $collection, string $groupByField)
    {
        $group = $collection->groupBy($groupByField);
        return $collection->map(function ($item, $key) use ($group){
            if ($group->has($item->id)) {
                $item->child = $group->get($item->id);
            }
            return $item;
        })->where($groupByField, 0);
    }
}
