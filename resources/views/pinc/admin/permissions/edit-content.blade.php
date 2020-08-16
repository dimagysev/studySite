@if (!$errors->isEmpty())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> {{__('pincrio.validation_error')}}</h5>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if( session()->exists('status') )
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>OK</h5>
        {{__('pincrio.saved_successful')}}
    </div>
@endif
<form method="post" enctype="multipart/form-data" action="{{ route('admin.permissions.update', ['permission' => $permission->id]) }}">
    @csrf
    @method('put')
    <input type="hidden" name="id" value="{{$permission->id}}">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;{{ __('pincrio.save') }}</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{__('pincrio.general')}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{ __('pincrio.name') }}</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $permission->name }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;{{ __('pincrio.save') }}</button>
        </div>
    </div>

</form>
