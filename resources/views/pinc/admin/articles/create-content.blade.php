<form method="post" enctype="multipart/form-data" action="{{ route('admin.articles.store') }}">
    @csrf
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;{{ __('pincrio.save') }}</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{__('pincrio.articles_attr')}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">{{ __('pincrio.title') }}</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="alias">{{ __('pincrio.alias') }}</label>
                                <input type="text" name="alias" id="alias" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="category">{{ __('pincrio.category') }}</label>
                                <select name="category" id="category" class="form-control" style="width: 100%">
                                    @if(isset($categories) && !empty($categories))
                                        @foreach($categories as $category)
                                            @include('components.pinc.build-category.category-item', compact('category'))
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="filters">{{ __('pincrio.filters') }}</label>
                                <select class="form-control" style="width: 100%" name="filters[]" id="filters" multiple="multiple" >
                                    @if(isset($filters) && !empty($filters))
                                        @foreach($filters as $filter)
                                            <option value="{{ $filter->id }}">{{ $filter->title }}</option>
                                        @endforeach
                                    @endif
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
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{__('pincrio.meta_data')}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="meta_desc">{{ __('pincrio.meta_desc') }}</label>
                                        <textarea class="form-control" name="meta_desc" id="meta_desc" cols="30" rows="7"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="meta_key">{{ __('pincrio.meta_key') }}</label>
                                        <textarea class="form-control" name="meta_key" id="meta_key" cols="30" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('pincrio.preview_text') }}</h3>
                        </div>
                        <div class="card-body">
                            <textarea name="desc" id="prev-text"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('pincrio.full_text') }}</h3>
                        </div>
                        <div class="card-body">
                            <textarea name="text" id="full-text"></textarea>
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
