<?php

namespace App\Models;

use App\Traits\Models\AppModelScopes;
use Cviebrock\EloquentSluggable\Sluggable;
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
    use AppModelScopes, Sluggable;

    protected $table = 'categories';
    protected $fillable = ['title', 'alias', 'parent_id'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function sluggable()
    {
        return [
            'alias' => [
                'source' => 'title'
            ]
        ];
    }
}
