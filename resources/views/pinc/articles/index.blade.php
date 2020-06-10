@extends( config('settings.THEME').'.layouts.site' )

@section('header')
    @include( config('settings.THEME') . '.header')
@endsection

@section('content')
    @include(config('settings.THEME').'.'.$routeName.'-content')
@endsection

@section('sidebar')
    @include( config('settings.THEME') . '.articles.sidebar')
@endsection

@section('footer')
    @include(config('settings.THEME').'.footer')
@endsection
