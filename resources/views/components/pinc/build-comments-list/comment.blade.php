<li id ="li-comment-{{$comment->id}}" class="comment {{ ($comment->userIsLogIn() && $comment->user->isAuthor($comment->article)) ? 'bypostauthor odd': 'even depth-1'}} ">
    <div id ="comment-{{$comment->id}}" class="comment-container">
        <div class="comment-author vcard">
            <img alt="" src="{{$comment->getUserAvatar()}}" class="avatar" height="75" width="75" />
            <cite class="fn">{{ $comment->getAuthor() }}</cite>
        </div>
        <!-- .comment-author .vcard -->
        <div class="comment-meta commentmetadata">
            <div class="intro">
                <div class="commentDate">
                    <a href="#comment">
                        {{$comment->created_at->format('M d, Y h:i a')}}
                    </a>
                </div>
                <div class="commentNumber">#&nbsp</div>
            </div>
            <div class="comment-body">
                <p>{{ $comment->text }}</p>
            </div>
            <div class="reply group">
                <a class="comment-reply-link" href="#respond" data-commentId = "{{ $comment->id }}" >Reply</a>
            </div>
            <!-- .reply -->
        </div>
        <!-- .comment-meta .commentmetadata -->
    </div>

        <ul class="children">
        @if ($comment->child)
            @foreach($comment->child as $child)
                @include('components.pinc.build-comments-list.comment', ['comment'=>$child])
            @endforeach
         @endif
        </ul>

    <!-- #comment-##  -->
</li>
