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
<form method="post" enctype="multipart/form-data" action="{{ route('admin.sliders.store') }}">
    @csrf
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
                                <label for="title">{{ __('pincrio.title') }}</label>
                                <textarea name="title" id="title">{{ old('title') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="text_position">{{ __('pincrio.text_position') }}</label>
                                <select class="form-control" style="width: 100%" name="text_position" id="text_position" >
                                    <option value="none">{{__('pincrio.text_position')}}</option>
                                    <option value="left">{{__('pincrio.text_left')}}</option>
                                    <option value="right">{{__('pincrio.text_right')}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="img">{{ __('pincrio.picture') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="img" id="img">
                                        <label class="custom-file-label" for="img">{{__('pincrio.choose_file')}}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc">{{ __('pincrio.desc') }}</label>
                                <textarea class="form-control" name="desc" id="desc">{{ old('desc') }}</textarea>
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
