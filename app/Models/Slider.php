<?php

namespace App\Models;

use App\Traits\Models\ImgAccessor;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Slider
 * @package App
 * @property string $title
 * @property string $img
 * @property string $desc
 * @property string $text_position
 */
class Slider extends Model
{
    use ImgAccessor;

    protected $table = 'sliders';
}
