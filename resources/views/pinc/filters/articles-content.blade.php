<div id="content-blog" class="content group">
    @isset($articles)
        @foreach( $articles as $article )
        <div class="sticky hentry hentry-post blog-big group">
            <!-- post featured & title -->
            <div class="thumbnail">
                <!-- post title -->
                <h2 class="post-title"><a href="{{ $article->getUrlShow() }}">{{ $article->title }}</a></h2>
                <!-- post featured -->
                <div class="image-wrap">
                    <img src="{{ asset(env('THEME'))}}/images/{{ $article->img->max }}" alt="{{$article->alias}}" title="{{$article->alias}}" />
                </div>
                <p class="date">
                    <span class="month">{{ $article->created_at->format('M') }}</span>
                    <span class="day">{{ $article->created_at->format('d') }}</span>
                </p>
            </div>
            <!-- post meta -->
            <div class="meta group">
                <p class="author"><span>by <a href="#" title="Posts by Nicola Mustone" rel="author">{{ $article->user->name }}</a></span></p>
                <p class="categories"><span>In:
                    @if($article->filters->count() > 0)
                        @foreach($article->filters as $filter)
                        <a href="{{ route('filters', ['alias'=>$filter->alias, 'entity'=>$article->getTable()])}}" title="{{$filter->title}}" rel="category tag">{{ $filter->title }}</a>
                        {{ !$article->filters->isLast($filter) ? ',' : ''}}
                        @endforeach
                    @else
                        No tags
                    @endif
                    </span></p>
                <p class="comments"><span><a href="{{ $article->getUrlShow() }}#respond" title="{{$article->title}}">{{count($article->comments) > 0 ? count($article->comments) :'No comments'}}</a></span></p>
            </div>
            <!-- post content -->
            <div class="the-content group">
                {!! $article->desc !!}
                <p><a href="{{ $article->getUrlShow() }}" class="btn   btn-beetle-bus-goes-jamba-juice-4 btn-more-link">→ Read more</a></p>
            </div>
            <div class="clear"></div>
        </div>
        @endforeach
        {{$articles->links(env('THEME').'.pagination')}}
    @else
        <div class="box info-box">
            Нет статей в данном разделе
        </div>
    @endisset

</div>
