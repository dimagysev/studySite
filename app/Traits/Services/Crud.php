<?php


namespace App\Traits\Services;


use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

trait Crud
{
    use StoreImages;

    public function create(array $data)
    {
        $this->image = $data['img'];
        $filters = Arr::pull($data, 'filters');
        $data['img'] = json_encode([
            'mini'  => $this->storeMin(),
            'max'   => $this->storeMax(),
            'path'  => $this->storeOriginal()
        ]);
        return DB::transaction(function () use ($data, $filters){
            $entity = $this->model::query()->create($data);
            $entity->filters()->attach($filters);
            return $entity;
        }, config('settings.transaction_attempts'));
    }

    public function update(string $alias, array $data)
    {
        if (request()->has('img')){
            $this->image = $data['img'];
            $data['img'] = json_encode([
                'mini'  => $this->storeMin(),
                'max'   => $this->storeMax(),
                'path'  => $this->storeOriginal()
            ]);
        }
        $filters = Arr::pull($data, 'filters');
        $entity = $this->getByAlias($alias);
        return DB::transaction(function () use ($data, $entity, $filters){
            $updated = $entity->update($data);
            $entity->filters()->sync($filters);
            return $updated;
        }, config('settings.transaction_attempts'));
    }

    public function delete($alias)
    {
        $entity = $this->getByAlias($alias);
        $filtersId = $entity->filters->pluck('id')->all();
        DB::transaction(function () use($entity, $filtersId){
            $entity->filters()->detach($filtersId);
            return $entity->delete();
        }, config('settings.transaction_attempts'));
    }
}
