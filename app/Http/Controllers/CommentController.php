<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommentController extends SiteController
{
    public function __construct(CommentService $commentService, ArticleService $articleService)
    {
        $this->commentService = $commentService;
        $this->articleService = $articleService;
        parent::__construct();
    }

    public function addComment(Request $request)
    {
        try {
            $comment = $this->commentService->validate($request->all());
        } catch (ValidationException $e) {
            return response()->json(['errors'=>$e->errors()], 422);
        }
        $article = $this->articleService->getById($request->post('article_id'));
        $comment = $this->commentService->saveComment($comment, $article);
        $view = view('components.pinc.build-comments-list.comment', ['comment' => $comment])->render();
        return response()->json([
            'parent' => $comment->parent_id,
            'id' =>$comment->id,
            'comment' => $view
        ]);
    }
}
