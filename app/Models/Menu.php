<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * @package App
 * @property string $title
 * @property string $alias
 * @property int $parent
 */
class Menu extends Model
{
    protected $table = 'menus';
}
