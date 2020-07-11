@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('pincrio.edit_slide') }}</h1>
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

            $('#title').summernote({
                height:200,
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
