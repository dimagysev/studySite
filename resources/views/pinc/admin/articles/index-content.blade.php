<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Articles</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Добавить статью</a>
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
                            <td><img src="{{asset(config('settings.THEME'))}}/images/{{$article->img->mini}}" alt=""></td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->title }}</td>
                            <td>{{ $article->user->name }}</td>
                            <td>
                                <a href="{{ route('admin.articles.show', ['alias' => $article->alias]) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.articles.edit', ['alias' => $article->alias]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.articles.destroy', ['alias' => $article->alias]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    Статей нет
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


