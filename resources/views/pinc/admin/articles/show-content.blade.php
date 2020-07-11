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
                            <td>{{ $article->title }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.alias') }}</th>
                            <td>{{ $article->alias }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.category') }}</th>
                            <td>{{ $article->category->title }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.filters') }}</th>
                            <td>
                                @foreach($article->filters as $filter)
                                    {{ $filter->title }}{{$article->filters->isLast($filter) ? '' : ','}}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.author') }}</th>
                            <td>{{ $article->user->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.created_at') }}</th>
                            <td>{{ $article->created_at->translatedFormat('d.m.Y | H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('pincrio.update_at') }}</th>
                            <td>{{ !empty($article->updated_at) ? $article->updated_at->translatedFormat('d.m.Y | H:i:s') : '-'}}</td>
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
                        <a class="nav-item nav-link active" id="article-desc-tab" data-toggle="tab" href="#article-desc" role="tab" aria-controls="article-desc" aria-selected="true">{{ __('pincrio.preview_text') }}</a>
                        <a class="nav-item nav-link" id="product-full-tab" data-toggle="tab" href="#article-full" role="tab" aria-controls="article-full" aria-selected="false">{{__('pincrio.full_text')}}</a>
                        <a class="nav-item nav-link" id="product-img-tab" data-toggle="tab" href="#article-img" role="tab" aria-controls="article-img" aria-selected="false">{{ __('pincrio.image') }}</a>
                        <a class="nav-item nav-link" id="product-img-tab" data-toggle="tab" href="#article-comments" role="tab" aria-controls="article-comments" aria-selected="false">{{ __('pincrio.comments') }}</a>
                        <a class="nav-item nav-link" id="product-img-tab" data-toggle="tab" href="#article-meta" role="tab" aria-controls="article-meta" aria-selected="false">{{ __('pincrio.meta_data') }}</a>
                    </div>
                </nav>

            <div class="card-body overflow-auto" style="height: 437px;">
                <div class="tab-content p-3" id="nav-tabContent" >
                    <div class="tab-pane fade active show" id="article-desc" role="tabpanel" aria-labelledby="article-desc-tab">{!! $article->desc !!} </div>
                    <div class="tab-pane fade" id="article-full" role="tabpanel" aria-labelledby="article-full-tab">{!! $article->text !!}</div>
                    <div class="tab-pane fade" id="article-img" role="tabpanel" aria-labelledby="article-img-tab">
                        <img src="{{asset('storage')}}/images/{{$article->img->max}}" class="w-100">
                    </div>
                    <div class="tab-pane fade" id="article-comments" role="tabpanel" aria-labelledby="article-comments-tab">
                        @if($article->comments->isNotEmpty())
                            @foreach($article->comments as $comment)
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="{{$comment->getUserAvatar('small')}}" alt="user image">
                                    <span class="username">
                                        <a href="#">{{ $comment->getAuthor() }}</a>
                                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <span class="description">{{ $comment->created_at->translatedFormat('d.m.Y - H:i') }}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>{{ $comment->text }}</p>
                            </div>
                            @endforeach
                        @else
                            {{ __('pincrio.no_comments') }}
                        @endif

                    </div>
                    <div class="tab-pane fade" id="article-meta" role="tabpanel" aria-labelledby="article-meta-tab">
                        <strong>{{ __('pincrio.meta_desc') }}</strong>
                        <p class="text-muted">
                            {{ $article->meta_desc ?? '-'}}
                        </p>
                        <hr>
                        <strong>{{ __('pincrio.meta_key') }}</strong>
                        <p class="text-muted">
                            {{ $article->meta_key ?? '-'}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

