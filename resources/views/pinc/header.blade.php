<div id="header" class="group">
    <div class="group inner">
        <!-- START LOGO -->
        <x-pinc.logo :route="route('home.index')" id="logo" class="group"/>
        <!-- END LOGO -->
        <div id="sidebar-header" class="group">
            <div class="widget-first widget yit_text_quote">
                <blockquote class="text-quote-quote">&#8220;The caterpillar does all the work but the butterfly gets all the publicity.&#8221;</blockquote>
                <cite class="text-quote-author">George Carlin</cite>
            </div>
        </div>
        <div class="clearer"></div>
        <hr />
        <!-- START MAIN NAVIGATION -->
        @isset($menu)
        <x-menu :menu="$menu" />
        @endisset
        <!-- END MAIN NAVIGATION -->
        <div id="header-shadow"></div>
        <div id="menu-shadow"></div>
    </div>
</div>
