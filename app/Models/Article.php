<?php

namespace App\Models;



use App\Traits\Models\AppModelScopes;
use App\Traits\Models\ImgAccessor;
use App\Traits\Models\GetUrl;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App
 * @property Category $category
 * @property User $user
 * @property Comment[] $comments
 * @property Filter[] $filters
 * @property string $alias
 * @property string $title
 * @property string $text
 * @property string $desc
 * @property string $img
 * @property int $user_id
 * @property string $meta_desc
 * @property string $meta_key
 */
class Article extends Model
{
    use AppModelScopes, GetUrl, ImgAccessor, Sluggable;

    protected $table = 'articles';
    protected $fillable = [
        'title',
        'alias',
        'text',
        'desc',
        'img',
        'user_id',
        'category_id',
        'meta_desc',
        'meta_key'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function filters()
    {
        return $this->morphToMany(Filter::class, 'filterable');
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
