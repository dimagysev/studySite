<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 * @property Article[] $articles
 * @property string $title
 * @property string $alias
 * @property int $parent_id
 */
class Category extends Model
{
    protected $table = 'categories';

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
