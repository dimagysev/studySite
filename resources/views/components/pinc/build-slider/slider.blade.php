<div {{ $attributes->merge(['class'=>'slider cycle no-responsive slider_cycle group'])}}>
    <ul class="slider">
        {!! $buildSlider($slider) !!}
    </ul>
    {{ $widget ?? ''}}
</div>


