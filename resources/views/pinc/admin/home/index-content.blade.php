<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>
                <p>{{ __('pincrio.pages') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-paperclip"></i>
            </div>
            <a href="#" class="small-box-footer">
                {{ __('pincrio.more_info') }} <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $userCount }}</h3>
                <p>{{ __('pincrio.users') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
                {{ __('pincrio.more_info') }} <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-gradient-teal">
            <div class="inner">
                <h3>{{ $menuCount }}</h3>
                <p>{{ __('pincrio.menu') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-list"></i>
            </div>
            <a href="#" class="small-box-footer">
                {{ __('pincrio.more_info') }} <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $articlesCount }}</h3>
                <p>{{ __('pincrio.articles') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-file"></i>
            </div>
            <a href="{{ route('admin.articles.index') }}" class="small-box-footer">
                {{ __('pincrio.more_info') }} <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $portfoliosCount }}</h3>
                <p>{{ __('pincrio.portfolios') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-project-diagram"></i>
            </div>
            <a href="{{ route('admin.portfolios.index') }}" class="small-box-footer">
                {{ __('pincrio.more_info') }} <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-gradient-maroon">
            <div class="inner">
                <h3>{{ $filtersCount }}</h3>
                <p>{{ __('pincrio.filters') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-filter"></i>
            </div>
            <a href="#" class="small-box-footer">
                {{ __('pincrio.more_info') }} <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-gradient-fuchsia">
            <div class="inner">
                <h3>{{ $sliderCount }}</h3>
                <p>{{ __('pincrio.sliders') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-camera"></i>
            </div>
            <a href="#" class="small-box-footer">
                {{ __('pincrio.more_info') }} <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
