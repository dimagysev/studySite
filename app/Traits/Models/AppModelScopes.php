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
    /**
     * @param Builder $query
     * @param int|null $limit
     * @return Builder
     */
    public function scopeLast(Builder $query, ?int $limit) : Builder
    {
        return $query->orderBy('created_at', 'desc')->take($limit);
    }

    /**
     * @param Builder $query
     * @param int|null $perPage
     * @return \Illuminate\Database\Concerns\BuildsQueries|Builder|mixed
     */
    public function scopeGetOrPaginate(Builder $query, ?int $perPage)
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
