<?php


namespace App\Traits\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Trait AppModelScopes
 * @package App\Traits
 * @method Builder last(int $limit)
 * @method Builder getOrPaginate(int $paginateCount)
 */
trait AppModelScopes
{
    public function scopeLast(Builder $query, int $limit = null) : Builder
    {
        return $query->orderBy('created_at', 'desc')->take($limit);
    }

    public function scopeGetOrPaginate(Builder $query, $perPage)
    {
        return $query->when($perPage,
            function (Builder $query, $perPage){
                return $query->paginate($perPage);
            },
            function (Builder $query){
                return $query->get();
            }
        );
    }
}
