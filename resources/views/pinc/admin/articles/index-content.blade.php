@if( session()->exists('status') )
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>OK</h5>
        {{__('pincrio.delete_successful')}}
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('pincrio.add_article') }}</a>
                </div>
            </div>
            <div class="card-body">
                @if( isset($articles) && !empty($articles))
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Картинка</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Автор</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td><img src="{{ asset('storage') }}/images/{{$article->img->mini}}" alt=""></td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->title }}</td>
                            <td>{{ $article->user->name }}</td>
                            <td>
                                <a href="{{ route('admin.articles.show', ['alias' => $article->alias]) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.articles.edit', ['alias' => $article->alias]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.articles.destroy', ['alias' => $article->alias]) }}" data-form = "{{ $article->alias }}"  class="btn btn-danger delete-material"><i class="fas fa-trash"></i></a>
                                <form action="{{ route('admin.articles.destroy', ['alias' => $article->alias]) }}" name="{{ $article->alias }}" method="post">
                                    @method('delete')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                {{__('pincrio.list_articles_empty')}}
                @endif
            </div>
            <div class="card-footer">
                @if( isset($articles) && !empty($articles))
                    {{ $articles->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-danger" style=" padding-right: 15px;" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('pincrio.deleting_article') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('pincrio.are_you_sure') }}</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">{{__('pincrio.cancel')}}</button>
                <button type="button" class="btn btn-outline-light delete-confirm">{{__('pincrio.ok')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

