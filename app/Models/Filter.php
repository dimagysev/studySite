<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Filter
 * @package App
 * @property Portfolio[] $portfolios
 * @property Article[] $articles
 * @property string $title
 * @property string $alias
 */
class Filter extends Model
{
    use Sluggable;

    protected $table = 'filters';
    //public $timestamps = false;
    protected $fillable = ['title', 'alias'];
    protected $touches= ['articles', 'portfolios'];

    public function portfolios()
    {
        return $this->morphedByMany(Portfolio::class,'filterable');
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class,'filterable');
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
