<form>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

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
                                <select name="category" id="category" class="form-control">

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="img">{{ __('pincrio.picture') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="img" id="img">
                                        <label class="custom-file-label" for="img">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="meta_desc">{{ __('pincrio.meta_desc') }}</label>
                                        <textarea class="form-control" name="meta_desc" id="meta_desc" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="meta_key">{{ __('pincrio.meta_key') }}</label>
                                        <textarea class="form-control" name="meta_key" id="meta_key" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="filters">{{ __('pincrio.filters') }}</label>
                                <select class="form-control" name="filters[]" id="filters" multiple="multiple" >
                                    @if(isset($filters) && !empty($filters))
                                        @foreach($filters as $filter)
                                            <option value="{{ $filter->id }}">{{ $filter->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('pincrio.preview_text') }}</h5>
                </div>
                <div class="card-body">
                    <textarea name="desc" id="prev-text"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('pincrio.full_text') }}</h5>
                </div>
                <div class="card-body">
                    <textarea name="text" id="full-text"></textarea>
                </div>
            </div>
        </div>
    </div>
</form>
