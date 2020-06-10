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
    protected const RELATIONS = [];

    public function getLast(?int $limit = null) : Collection
    {
        return $this->model::query()->last($limit)->get();
    }

    public function getByAlias(string $alias): Model
    {
       return $this->model->where('alias', $alias)->firstOrFail();
    }

    public function getById($id) : Model
    {
       return $this->model->findOrFail($id);
    }

    public function loadRelations($entity): void
    {
        $entity->load(static::RELATIONS);
    }
}
