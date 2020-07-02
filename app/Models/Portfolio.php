<?php

namespace App\Models;

use App\Traits\Models\AppModelScopes;
use App\Traits\Models\ImgAccessor;
use App\Traits\Models\GetUrl;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Portfolio
 * @package App
 * @property string $alias
 * @property string $title
 * @property string $text
 * @property string $customer
 * @property string $img
 * @property string $meta_desc
 * @property string $meta_key
 * @property Filter[] $filters
 * @property Portfolio[] $relatedPortfolios
 * @method  Builder query()
*/
class Portfolio extends Model
{
    use AppModelScopes, GetUrl, ImgAccessor;

    protected $table = "portfolios";
    protected $touches= ['filters'];

    public function filters()
    {
        return $this->morphToMany(Filter::class, 'filterable');
    }

    public function relatedPortfolios()
    {
        return $this->belongsToMany(__CLASS__, 'portfolio-relation', 'portfolio_id','related_id','id', 'id');
    }
}

