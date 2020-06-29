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
            $('#category').select2();
            $('#prev-text').summernote({
                tabsize: 2,
                height: 300
            });
            $('#full-text').summernote({
                tabsize: 2,
                height: 300
            });
            $('.custom-file-input').on('input', function (event) {
                let fileName = event.target.value.split('\\').reverse()[0];
                $('.custom-file-label').text(fileName);
            });
        });
    </script>
@stop
@section('footer')
    <p>Welcome to this beautiful admin panel.</p>
@stop
