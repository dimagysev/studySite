@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('pincrio.create_filter') }}</h1>
@stop

@section('content')
    @include(config('settings.THEME').'.'.$routeName.'-content')
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('adminstyle')}}/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#title').change(function () {
                if ($(this).val()) {
                    $.post('{{ route('admin.filters.createAlias') }}',
                        {
                            '_token': $('meta[name=csrf-token]').attr('content'),
                            'title': $(this).val()
                        },
                        data => $('#alias').val(data.alias),
                    );
                } else {
                    $('#alias').val('');
                }
            });
        })

    </script>
@stop
@section('footer')
    <p>Welcome to this beautiful admin panel.</p>
@stop
