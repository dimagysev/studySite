<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('pincrio.general') }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('pincrio.field') }}</th>
                            <th>{{ __('pincrio.value') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{ __('pincrio.title') }}</th>
                            <td>{{ $portfolio->title }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.alias') }}</th>
                            <td>{{ $portfolio->alias }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.filters') }}</th>
                            <td>
                                @foreach($portfolio->filters as $filter)
                                    {{ $filter->title }}{{$portfolio->filters->isLast($filter) ? '' : ','}}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.customer') }}</th>
                            <td>{{ $portfolio->customer }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.created_at') }}</th>
                            <td>{{ $portfolio->created_at->translatedFormat('d.m.Y | H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.update_at') }}</th>
                            <td>{{ !empty($portfolio->updated_at) ? $portfolio->updated_at->translatedFormat('d.m.Y | H:i:s') : '-'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="portfolio-img-tab" data-toggle="tab" href="#portfolio-img" role="tab" aria-controls="portfolio-img" aria-selected="false">{{ __('pincrio.image') }}</a>
                    <a class="nav-item nav-link" id="portfolio-full-tab" data-toggle="tab" href="#portfolio-full" role="tab" aria-controls="portfolio-full" aria-selected="false">{{__('pincrio.full_text')}}</a>
                    <a class="nav-item nav-link" id="portfolio-meta-tab" data-toggle="tab" href="#portfolio-meta" role="tab" aria-controls="portfolio-meta" aria-selected="false">{{ __('pincrio.meta_data') }}</a>
                    <a class="nav-item nav-link" id="portfolio-related-tab" data-toggle="tab" href="#portfolio-related" role="tab" aria-controls="portfolio-related" aria-selected="false">{{ __('pincrio.portfolio_relations') }}</a>
                </div>
            </nav>
            <div class="card-body overflow-auto" style="height: 385px;">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="portfolio-img" role="tabpanel" aria-labelledby="portfolio-img-tab">
                        <img src="{{asset('storage')}}/images/{{ $portfolio->img->max }}" class="w-100">
                    </div>
                    <div class="tab-pane fade" id="portfolio-full" role="tabpanel" aria-labelledby="portfolio-full-tab">{!! $portfolio->text !!}</div>
                    <div class="tab-pane fade" id="portfolio-meta" role="tabpanel" aria-labelledby="portfolio-meta-tab">
                        <strong>{{ __('pincrio.meta_desc') }}</strong>
                        <p class="text-muted">
                            {{ $portfolio->meta_desc ?? '-'}}
                        </p>
                        <hr>
                        <strong>{{ __('pincrio.meta_key') }}</strong>
                        <p class="text-muted">
                            {{ $portfolio->meta_key ?? '-'}}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="portfolio-related" role="tabpanel" aria-labelledby="portfolio-related-tab">
                        @if( $portfolio->relatedPortfolios->isNotEmpty())
                        <table class="table table-hover">
                            <tbody>
                                @foreach($portfolio->relatedPortfolios as $related)
                                <tr>
                                    <td><img src="{{ asset('storage')}}/images/{{ $related->img->mini }}" alt="" style="width: 70px"></td>
                                    <td><a href="{{ route('admin.portfolios.show', ['alias' => $related->alias]) }}">{{ $related->title }}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            {{ __('pincrio.portfolio_relations_empty') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

