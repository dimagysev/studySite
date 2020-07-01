<div id="content-home" class="content group">
    <div class="hentry group">
        @if (isset($lastPortfolios) && !empty($lastPortfolios))
        <div class="section portfolio">
            <h3 class="title">{{ __('pincrio.latest_projects') }}</h3>
            <div class="hentry work group portfolio-sticky portfolio-full-description">
                <div class="work-thumbnail">
                    <a class="thumb"><img src="{{ asset('storage') }}/images/{{ $lastOnePortfolio->img->max }}" alt="{{$lastOnePortfolio->title}}" title="{{$lastOnePortfolio->title}}" /></a>
                    <div class="work-overlay">
                        <h3><a href="{{ $lastOnePortfolio->getUrlShow()}}">{{$lastOnePortfolio->title}}</a></h3>
                        <p class="work-overlay-categories"><img src="{{asset(env('THEME'))}}/images/categories.png" alt="Categories" />in:
                            @foreach($lastOnePortfolio->filters as $filter)
                            <a href="{{ route('filters', ['alias'=>$filter->alias, 'entity'=>$lastOnePortfolio->getTable()])}}">{{$filter->title}}</a>{{$lastOnePortfolio->filters->isLast($filter) ? '':','}}
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="work-description">
                    <h2><a href="{{ $lastOnePortfolio->getUrlShow()}}">{{$lastOnePortfolio->title}}</a></h2>
                    <p class="work-categories">in:
                        @foreach($lastOnePortfolio->filters as $filter)
                        <a href="{{ route('filters', ['alias'=>$filter->alias, 'entity'=>$lastOnePortfolio->getTable()])}}">{{$filter->title}}</a>{{$lastOnePortfolio->filters->isLast($filter) ? '':','}}
                        @endforeach
                    </p>
                    <p>{!!  Str::limit($lastOnePortfolio->text, 300) !!}</p>
                        <a href="{{ $lastOnePortfolio->getUrlShow()}}" class="read-more">|| Read more</a>
                </div>
            </div>

            <div class="clear"></div>

            <div class="portfolio-projects">
                @foreach( $lastPortfolios as $key => $portfolio)
                <div class="{{ ($key + 1) % 4 === 0 ? 'related_project_last' : ''}} related_project">
                    <div class="overlay_a related_img">
                        <div class="overlay_wrapper">
                            <img src="{{ asset('storage') }}/images/{{ $portfolio->img->mini }}" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}" />
                            <div class="overlay">
                                <a class="overlay_img" href="{{ asset('storage') }}/images/{{ $portfolio->img->path }}" rel="lightbox" title="{{ $portfolio->title }}"></a>
                                <a class="overlay_project" href="{{ $portfolio->getUrlShow() }}"></a>
                                <span class="overlay_title">{{ $portfolio->title }}</span>
                            </div>
                        </div>
                    </div>
                    <h4><a href="{{ $portfolio->getUrlShow() }}">{{ $portfolio->title }}</a></h4>
                    <p>{{ Str::limit($portfolio->text, 50) }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="clear"></div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>

    <!-- END COMMENTS -->
</div>
