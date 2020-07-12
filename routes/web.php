<?php

use Illuminate\Support\Facades\Route;

Route::get('/','IndexController@index')->name('home.index');

Route::prefix('portfolios')->name('portfolios.')->group(function (){
    Route::get('/','PortfolioController@index')->name('index');
    Route::get('/{alias}', 'PortfolioController@show')->name('show');
});

Route::prefix('articles')->name('articles.')->group(function (){
    Route::get('/', 'ArticleController@index')->name('index');
    Route::get('/{alias}', 'ArticleController@show')->name('show');
    Route::prefix('cat')->name('cat.')->group(function (){
        Route::get('/{category}', 'ArticleController@index')->name('index');
    });
});

Route::prefix('filter')->get('/{alias}/{entity}', 'FilterController@index')->name('filters');

Route::prefix('contacts')->name('contacts.')->group(function (){
    Route::get('/', 'ContactController@index')->name('index');
    Route::post('/send', 'ContactController@send')->name('send');
});

Route::post('/comment', 'CommentController@addComment')->name('comments.add');

Route::name('auth.')->namespace('Auth')->group(function (){
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::prefix(config('settings.admin_path'))->namespace('Admin')
    ->name('admin.')->middleware('auth')->group(function (){

        //home
        Route::get('/', 'IndexController@index')->name('home.index');

        //articles
        Route::resource('articles', 'ArticleController')->parameters(['articles' => 'alias']);
        Route::post('/articles/create_alias', 'ArticleController@createAlias')->name('articles.createAlias');

        //portfolios
        Route::get('/portfolios/get/related/portfolios', 'PortfolioController@related')->name('portfolios.related');
        Route::post('/portfolios/create_alias', 'PortfolioController@createAlias')->name('portfolios.createAlias');
        Route::resource('portfolios', 'PortfolioController')->parameters(['portfolios' => 'alias']);

        //sliders
        Route::resource('sliders', 'SliderController')->except('show');

        //filters
        Route::resource('filters', 'FilterController')->parameters(['filters' => 'alias'])->except('show');
        Route::post('/filters/create_alias', 'FilterController@createAlias')->name('filters.createAlias');

        //categories
        Route::resource('categories', 'CategoryController')->parameters(['categories' => 'alias'])->except('show');
        Route::post('/categories/create_alias', 'CategoryController@createAlias')->name('categories.createAlias');

});
