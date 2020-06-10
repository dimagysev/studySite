<ol class="commentlist group" id = 'comments-container'>
    @foreach($comments as $key => $comment)
        @include('components.pinc.build-comments-list.comment',['comment'=> $comment])
    @endforeach
</ol>
