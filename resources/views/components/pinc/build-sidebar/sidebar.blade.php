<div {{ $attributes->merge(['class'=>'widget-first widget recent-posts']) }}>
    <h3>{{ $title ?? ''}}</h3>
    @if(isset($collection) && !empty($collection))
    <div class="recent-post group">
        @foreach( $collection as $item )
            <div class="hentry-post group">
                <div class="thumb-img">
                    <img src="{{asset(env('THEME'))}}/images/{{ $item->img->mini}}" alt="{{ $item->title }}" title="{{ $item->title }}" style="width: 55px;height: 55px"/>
                </div>
                <div class="text">
                    <a href="{{ $item->getUrlShow() }}" title="{{ $item->title }}" class="title">{{ $item->title }}</a>
                   <p>{!! \Illuminate\Support\Str::limit($item->text, 130)!!}</p>
                    <p class="post-date">{{ $item->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>
