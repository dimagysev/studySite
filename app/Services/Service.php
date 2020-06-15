<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package App\Services
 * @property Model $model
 */
abstract class Service
{
    protected $model;
    protected $paginate = 3;
    protected $relations = [];

    /**
     * @param array $relations
     * @return $this
     */
    public function setRelations(array $relations): Service
    {
        $this->relations = $relations;
        return $this;
    }

    public function getLast(?int $limit = null) : Collection
    {
        return $this->model::query()->with($this->relations)->last($limit)->get();
    }

    public function getByAlias(string $alias): Model
    {
       return $this->model::query()->with($this->relations)->where('alias', $alias)->firstOrFail();
    }

    public function getById($id) : Model
    {
       return $this->model::query()->with($this->relations)->findOrFail($id);
    }
}
