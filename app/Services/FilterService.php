<?php


namespace App\Services;


use App\Models\Filter;

class FilterService extends Service
{
    public function __construct(Filter $filter)
    {
        $this->model = $filter;
    }

    public function getFilters()
    {
        return $this->model::all();
    }

}
