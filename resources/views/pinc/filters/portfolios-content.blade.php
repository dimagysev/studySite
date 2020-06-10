<div id="content-page" class="content group">
    <div class="hentry group">
        @if (isset($portfolios) && !empty($portfolios))
        <div id="portfolio" class="portfolio-big-image">
            @foreach($portfolios as $portfolio)
                <div class="hentry work group">
                    <div class="work-thumbnail">
                        <div class="nozoom">
                            <img src="{{ asset(config('settings.THEME'))}}/images/{{$portfolio->img->max}}" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}" />
                            <div class="overlay">
                                <a class="overlay_img" href="{{ asset(config('settings.THEME'))}}/images/{{$portfolio->img->path}}" rel="lightbox" title="{{ $portfolio->title }}"></a>
                                <a class="overlay_project" href="{{$portfolio->getUrlShow()}}"></a>
                                <span class="overlay_title">{{ $portfolio->title }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="work-description">
                        <h3>{{ $portfolio->title }}</h3>
                        {!! Str::limit($portfolio->text, 250)!!}
                        <div class="clear"></div>
                        <div class="work-skillsdate">
                            <p class="skills">
                                @if ( !$portfolio->filters->isEmpty() )
                                <span class="label">In:</span>
                                    @foreach($portfolio->filters as $filter)
                                        <a href="{{ route('filters', ['alias'=>$filter->alias, 'entity'=>$portfolio->getTable()])}}">{{ $filter->title }}</a> {{ $portfolio->filters->isLast($filter) ? '' : ','}}
                                    @endforeach
                                @endif
                            </p>
                            <p class="workdate"><span class="label">Customer:</span> {{ $portfolio->customer }}</p>
                            <p class="workdate"><span class="label">Year:</span> {{ $portfolio->created_at->format('Y') }}</p>
                        </div>
                        <a class="read-more" href="{{ $portfolio->getUrlShow() }}">View Project</a>
                    </div>
                    <div class="clear"></div>
                </div>
            @endforeach
        </div>
        <div class="clear"></div>
        {{ $portfolios->links('pinc.pagination') }}
        @endif
    </div>
</div>


