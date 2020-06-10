@extends(env('THEME').'.articles.index')

@section('header')
    @parent
@endsection

@section('content')
    @include(config('settings.THEME').'.'.$routeName.'-content')
@endsection

@section('sidebar')
    @parent
@endsection

@section('footer')
    @parent
@endsection
