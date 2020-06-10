@if(!$slide) @props(['slide']) @endif
<li {{ $attributes  ?? '' }}>
    <div class="slide-holder" style="background:  url('{{ asset(config('settings.THEME')) }}/images/{{ $slide->img }}') no-repeat center center" >
        <div class="slide-content-holder inner" style="height:483px;">
            @isset($slide->text_position)
                <div class="slide-content-holder-content" style="{{$slide->text_position == 'right' ? 'position: absolute; top:30px;right:650px;' :'position: absolute; top:80px;left:500px;'}}">
                    <div class="slide-title">
                        {!! $slide->title !!}
                    </div>
                    <div class="slide-content" style="color:#fff">
                        <p>{!! $slide->desc !!}</p>
                    </div>
                </div>
            @endisset
        </div>
    </div>
</li>

