<div {{ $attributes->merge(['class'=>'widget-first widget recent-posts']) }}>
    <h3>{{ $title ?? ''}}</h3>
    <div class="recent-post recent-comments group">
        @isset($collection)
            @foreach($collection as $item)
        <div class="the-post group">
            <div class="avatar">
                <img alt="" src="{{ $item->getUserAvatar('small')}}" class="avatar" />
            </div>
            <span class="author"><strong><a href="#">{{ $item->getAuthor() }}</a></strong> in</span>
            <a class="title" href="{{ $item->article->getUrlShow() }}">{{ $item->article->title }}</a>
            <p class="comment">
                {{$item->text}} <a class="goto" href="{{ $item->article->getUrlShow() }}">&#187;</a>
            </p>
        </div>
            @endforeach
        @endisset
    </div>
</div>
