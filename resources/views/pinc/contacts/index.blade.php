@extends(config('settings.THEME') . '.layouts.site')

@section('header')
    @include(config('settings.THEME') . '.header')
@endsection

@section('page-meta')
    @include(config('settings.THEME') . '.page-meta')
@endsection

@section('content')
    @include(config('settings.THEME') . '.'. $routeName . '-content')
@endsection

@section('sidebar')
    @include(config('settings.THEME') . '.'. $routeName . '-sidebar')
@endsection

@section('footer')
    @include(config('settings.THEME') . '.footer')
@endsection
