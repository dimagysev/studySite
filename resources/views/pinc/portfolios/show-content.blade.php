<div id="content-page" class="content group">
    <div class="clear"></div>
    <div class="posts">
        <div class="group portfolio-post internal-post">
            <div id="portfolio" class="portfolio-full-description">

                <div class="fulldescription_title gallery-filters">
                    <h1>{{ $portfolio->title }}</h1>
                </div>

                <div class="portfolios hentry work group">
                    <div class="work-thumbnail">
                        <a class="thumb"><img src="{{asset(config('settings.THEME'))}}/images/{{$portfolio->img->max}}" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}" /></a>
                    </div>
                    <div class="work-description">
                        {!! $portfolio->text !!}
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
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="clear"></div>
                @if(!$otherPortfolios->isEmpty())
                <h3>Other Projects</h3>
                <div class="portfolio-full-description-related-projects">
                    @foreach($otherPortfolios as $portfolio)
                        <div class="related_project">
                            <a class="related_proj related_img" href="{{ $portfolio->getUrlShow() }}" title="{{ $portfolio->title }}"><img src="{{asset(config('settings.THEME'))}}/images/{{ $portfolio->img->mini}}" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}" /></a>
                            <h4><a href="{{ $portfolio->getUrlShow() }}">{{ $portfolio->title }}</a></h4>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
