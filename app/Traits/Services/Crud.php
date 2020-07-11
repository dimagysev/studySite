<?php


namespace App\Traits\Services;


use phpDocumentor\Reflection\Types\Callable_;

trait Crud
{
    use StoreImages;

    public function create(array $data, callable $callback = null)
    {
        if (request()->has('img')){
            $this->image = $data['img'];
            $data['img'] = $this->storeMax();
        }

        if (is_callable($callback)){
            return $callback($data);
        }

        return $this->model::query()->create($data);
    }

    public function update(string $alias, array $data, bool $id = false, callable $callback = null)
    {
        if (request()->has('img')){
            $this->image = $data['img'];
            $data['img'] = $this->storeMax();
        }

        $entity = !$id ? $this->getByAlias($alias) : $this->getById($alias);

        if (is_callable($callback)){
            return $callback($data, $entity);
        }
        return $entity->update($data);
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
