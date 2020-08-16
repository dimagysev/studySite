@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('pincrio.edit_role') }}</h1>
@stop

@section('content')
    @include(config('settings.THEME').'.'.$routeName.'-content')
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#permissions').select2();
        })

    </script>
@stop
@section('footer')
    <p>Welcome to this beautiful admin panel.</p>
@stop
