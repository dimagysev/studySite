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
                    <a href="{{ route('admin.filters.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('pincrio.add_filter') }}</a>
                </div>
            </div>
            <div class="card-body">
                @if( isset($filters) && !empty($filters))
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('pincrio.id') }}</th>
                            <th>{{ __('pincrio.title') }}</th>
                            <th>{{ __('pincrio.alias') }}</th>
                            <th>{{ __('pincrio.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($filters as $filter)
                            <tr>
                                <td>{{ $filter->id }}</td>
                                <td>{{ $filter->title }}</td>
                                <td>{{ $filter->alias }}</td>
                                <td>
                                    <a href="{{ route('admin.filters.edit', ['alias' => $filter->alias]) }}" class="btn btn-primary mt-1 pl-3 pr-3"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.filters.destroy', ['alias' => $filter->alias]) }}" data-form = "form-{{ $filter->alias }}"  class="btn btn-danger delete-material mt-1 pl-3 pr-3"><i class="fas fa-trash"></i></a>
                                    <form action="{{ route('admin.filters.destroy', ['alias' => $filter->alias]) }}" name="form-{{ $filter->alias }}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    {{ __('pincrio.list_filters_empty') }}
                @endif
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-danger" style=" padding-right: 15px;" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('pincrio.deleting_filter') }}</h4>
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


