@if( count($slider) > 0 )
<x-slider :slider="$slider" id="slider-cycle" style="height:485px;">
    <x-slot name="widget">
        <x-pinc.widget id="yit-widget-area" class="group"/>
    </x-slot>
</x-slider>
@endif
<div class="mobile-slider">
    <div class="slider fixed-image inner"><img src="{{asset(config('settings.THEME'))}}/images/sliders/cycle-fixed.jpg" alt="" /></div>
</div>
