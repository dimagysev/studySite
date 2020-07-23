@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('pincrio.users_list') }}</h1>
@stop

@section('content')
    @include(config('settings.THEME').'.'.$routeName.'-content')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('.delete-material').on('click', function (event) {

                event.preventDefault();

                $('#modal-danger').modal('show');
                const formName = $(this).attr('data-form');

                $('.delete-confirm').on('click', function () {
                    $('#modal-danger').modal('hide');
                    $('form[name='+formName+']').submit();
                });
            });

        } );
    </script>
@stop
@section('footer')
    <p>Welcome to this beautiful admin panel.</p>
@stop

