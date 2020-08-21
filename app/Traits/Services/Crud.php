<?php


namespace App\Traits\Services;


use App\Models\Article;
use phpDocumentor\Reflection\Types\Callable_;

trait Crud
{
    use StoreImages;

    public function create(array $data)
    {
        return $this->model::query()->create($data);
    }

    public function update(string $alias, array $data, bool $id = false)
    {
        $entity = !$id ? $this->getByAlias($alias) : $this->getById($alias);
        if (!$entity->update($data)){
            throw new \Exception('Saved Error', 500);
        }
        return $entity;
    }

    public function delete(string $alias, bool $id = false, callable $callback = null)
    {
        $entity = !$id ? $this->getByAlias($alias) : $this->getById($alias);
        if (is_callable($callback)){
            return $callback($entity);
        }
        return $entity->delete();
    }
}
