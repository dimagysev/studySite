<?php


namespace App\Services;


use App\Traits\Services\Crud;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package App\Services
 * @property Model $model
 */
abstract class Service
{
    use Crud;

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

    /**
     * @param int $perpage
     * @return $this
     */
    public function setPaginate(int $perpage)
    {
        $this->paginate = $perpage;
        return $this;
    }

    /**
     * @param int|null $limit
     * @return Collection
     */
    public function getLast(?int $limit) : Collection
    {
        return $this->model::query()->with($this->relations)->last($limit)->get();
    }

    /**
     * @param string $alias
     * @return Model
     */
    public function getByAlias(string $alias): Model
    {
       return $this->model::query()->with($this->relations)->where('alias', $alias)->firstOrFail();
    }

    /**
     * @param $id
     * @return Model
     */
    public function getById($id) : Model
    {
       return $this->model::query()->with($this->relations)->findOrFail($id);
    }
}
