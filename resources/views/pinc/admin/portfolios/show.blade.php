@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{$article->title}}</h1>
@stop

@section('content')
    @include(config('settings.THEME').'.'.$routeName.'-content')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
@section('footer')
    <p>Welcome to this beautiful admin panel.</p>
@stop


