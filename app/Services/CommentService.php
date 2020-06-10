<?php


namespace App\Services;

use App\Models\Comment;
use App\Traits\Services\BuildTree;
use App\Traits\Services\GetSidebar;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CommentService extends Service
{
    use GetSidebar, BuildTree;

    protected const RELATIONS = ['article', 'user'];

    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

    /**
     * @param $data
     * @return array
     * @throws ValidationException
     */
    public function validate($data): array
    {
        $rules = ['text' => 'required', 'parent_id' =>'integer|required', 'article_id' =>'integer|required'];
        $sometimes = ['name' =>['required','string','max:255'], 'email' =>['required','email']];
        $validator = Validator::make($data, $rules);
        $validator->sometimes(['name', 'email'], $sometimes, function (){
            return !auth()->check();
        });
        if ($validator->fails()){
            throw new ValidationException($validator);
        }
        return $validator->validated();
    }

    /**
     * @param $article
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getCommentsByArticle($article)
    {
        $comments = $article->comments()->with(self::RELATIONS)->get();
        return $this->buildTree($comments,'parent_id');
    }

    /**
     * @param $comment
     * @param $article
     * @return mixed
     */
    public function saveComment($comment, $article)
    {
        if ($user = auth()->user()){
            $comment['user_id'] = $user->id;
        }
        return $article->comments()->create($comment);
    }

    public function getLast(int $limit = null) : Collection
    {
        $comments = parent::getLast($limit);
        $this->loadRelations($comments);
        return $comments;
    }
}
