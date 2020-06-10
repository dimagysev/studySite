@extends( config('settings.THEME').'.portfolios.index' )

@section('header')
    @parent
@endsection

@section('page-meta')
@endsection

@section('content')
    @include(config('settings.THEME').'.'.$routeName.'-content')
@endsection

@section('footer')
    @parent
@endsection
