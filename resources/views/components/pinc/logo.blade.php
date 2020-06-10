@props(['route'])
<div {{ $attributes }} >
    <a href="{{ $route }}" title="Pink Rio"><img src="{{asset(env('THEME'))}}/images/logo.png" title="Pink Rio" alt="Pink Rio" /></a>
</div>
