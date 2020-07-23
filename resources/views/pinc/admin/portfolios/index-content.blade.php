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
                    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('pincrio.add_portfolio') }}</a>
                </div>
            </div>
            <div class="card-body">
                @if( isset($portfolios) && !empty($portfolios))
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Картинка</th>
                            <th>Название</th>
                            <th>Заказчик</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($portfolios as $portfolio)
                            <tr>
                                <td>{{ $portfolio->id }}</td>
                                <td><img src="{{ asset('storage') }}/images/{{$portfolio->img->mini}}" alt=""></td>
                                <td>{{ $portfolio->title }}</td>
                                <td>{{ $portfolio->customer }}</td>
                                <td>
                                    <a href="{{ route('admin.portfolios.show', ['alias' => $portfolio->alias]) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('admin.portfolios.edit', ['alias' => $portfolio->alias]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.portfolios.destroy', ['alias' => $portfolio->alias]) }}" data-form = "{{ $portfolio->alias }}"  class="btn btn-danger delete-material"><i class="fas fa-trash"></i></a>
                                    <form action="{{ route('admin.portfolios.destroy', ['alias' => $portfolio->alias]) }}" name="{{ $portfolio->alias }}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    {{ __('pincrio.list_portfolios_empty') }}
                @endif
            </div>
            <div class="card-footer">
                @if( isset($portfolios) && !empty($portfolios))
                    {{ $portfolios->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-danger" style=" padding-right: 15px;" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('pincrio.deleting_portfolio') }}</h4>
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


