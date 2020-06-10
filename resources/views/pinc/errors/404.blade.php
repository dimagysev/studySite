@extends( config('settings.THEME').'.layouts.site' )

@section('header')
    @include( config('settings.THEME') . '.header')
@endsection

@section('content')
    @include(config('settings.THEME').'.errors.404-content')
@endsection

@section('footer')
    @include(config('settings.THEME').'.footer')
@endsection

