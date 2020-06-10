<?php


namespace App\Traits\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Trait GetUrl
 * @package App\Traits
 * @property $table
 * @property $alias
 */
trait GetUrl
{
    public function getUrlShow()
    {
        return route($this->table . '.show', [ 'alias' => $this->alias]);
    }
}
