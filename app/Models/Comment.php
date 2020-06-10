<?php

namespace App\Models;

use App\Traits\Models\AppModelScopes;
use App\Traits\Models\ImgAccessor;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * Class Comment
 * @package App
 * @property Article $article
 * @property User $user
 * @property string $text
 * @property string $name
 * @property string $email
 * @property int $parent_id
 * @property int $article_id
 * @property int $user_id
 */
class Comment extends Model
{
    use AppModelScopes;

    protected $table = 'comments';
    protected $guarded = [];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userIsLogIn()
    {
        return !empty($this->user_id);
    }

    public function getUserAvatar($small = '')
    {
        $hash = $this->userIsLogIn()
            ? md5(strtolower(trim($this->user->email)))
            : md5(strtolower(trim($this->email)));
        $size = ($small === 'small') ? 55 : 75;
        return 'https://www.gravatar.com/avatar/' . $hash . '?d=mm&s=' . $size;
    }

    public function getAuthor()
    {
        return $this->userIsLogIn()
            ? $this->user->name
            : $this->name;
    }

}
