@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('pincrio.create_article') }}</h1>
@stop

@section('plugins.Datatables', true)

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
            $('#prev-text').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 350
            });
            $('#full-text').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 350
            });
        });
    </script>
@stop
@section('footer')
    <p>Welcome to this beautiful admin panel.</p>
@stop
