@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('pincrio.edit_user') }}</h1>
@stop

@section('content')
    @include(config('settings.THEME').'.'.$routeName.'-content')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#filters').select2();

            $('#category').select2();

        });
    </script>
@stop
@section('footer')
    <p>Welcome to this beautiful admin panel.</p>
@stop
