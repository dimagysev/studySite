@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

{{--@section('plugins.Datatables', true)--}}

@section('content')
    @include(config('settings.THEME').'.'.$routeName.'-content')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('test'); </script>
@stop
@section('footer')
    <p>Welcome to this beautiful admin panel.</p>
@stop
