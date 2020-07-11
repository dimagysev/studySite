@if(!$slide) @props(['slide']) @endif
<li {{ $attributes  ?? '' }}>
    <div class="slide-holder" style="background:  url('{{ asset('storage') }}/images/{{ $slide->img }}') no-repeat center center" >
        <div class="slide-content-holder inner" style="height:483px;">
            @if($slide->text_position !== 'none')
                <div class="slide-content-holder-content" style="{{$slide->text_position === 'right' ? 'position: absolute; top:30px;right:650px;' : 'position: absolute; top:80px;left:500px;'}}">
                    @isset($slide->title)
                    <div class="slide-title">
                        {!! $slide->title !!}
                    </div>
                    @endisset
                    @isset($slide->desc)
                    <div class="slide-content" style="color:#fff">
                        <p>{!! $slide->desc !!}</p>
                    </div>
                    @endisset
                </div>
            @endif
        </div>
    </div>
</li>

