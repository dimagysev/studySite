<div {{ $attributes->merge(['class'=>'widget-last widget text-image']) }}>
    <h3>{{ $title }}</h3>
    <div class="text-image" style="text-align:left"><img src="{{asset(config('settings.THEME'))}}/images/callus.gif" alt="Customer support" /></div>
    <p>{{ $slot }}</p>
</div>
