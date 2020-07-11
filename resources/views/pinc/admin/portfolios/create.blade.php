@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('pincrio.create_portfolio') }}</h1>
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

            $('#related').select2({
                minimumInputLength: 2,
                ajax: {

                    dataType: 'json',
                    delay: 250,
                    url: '{{ route('admin.portfolios.related') }}',

                    data: function (params) {
                        return  {
                            q: params.term,
                        }
                    },
                    processResults: function (data) {
                        return {
                            results: data.data,
                        };
                    },
                },

                templateResult: function (res) {
                    return $(
                        `<span><img src="{{ asset('storage') }}/images/${res.img}" style="width:55px;"/>&nbsp;&nbsp;${res.text}</span>`
                    );
                }

            });

            $('#full-text').summernote({
                tabsize: 2,
                height: 300
            });

            $('.custom-file-input').on('input', function (event) {
                let fileName = event.target.value.split('\\').reverse()[0];
                $('.custom-file-label').text(fileName);
            });

            $('#title').change(function () {
                if ($(this).val()) {
                    $.post('{{ route('admin.portfolios.createAlias') }}',
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
        });
    </script>
@stop
@section('footer')
    <p>Welcome to this beautiful admin panel.</p>
@stop
