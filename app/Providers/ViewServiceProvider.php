<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('set', static function ($params){
            [$varName, $value] = explode(',', $params);
            return "<? $varName = $value;?>";
        });
        /**Меню*/
        View::composer([env('THEME').'.header'], 'App\View\Composers\MenuComposer');

    }
}
