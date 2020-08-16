@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('pincrio.create_permission') }}</h1>
@stop

@section('content')
    @include(config('settings.THEME').'.'.$routeName.'-content')
@stop

@section('footer')
    <p>Welcome to this beautiful admin panel.</p>
@stop
