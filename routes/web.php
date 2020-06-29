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

    Route::get('/', 'IndexController@index')->name('home.index');

    Route::name('articles.')->prefix('articles')->group(function (){
        Route::get('/', 'ArticleController@index')->name('index');
        Route::get('/create', 'ArticleController@create')->name('create');
        Route::post('/', 'ArticleController@store')->name('store');
        Route::get('/{alias}', 'ArticleController@show')->name('show');
        Route::get('/{alias}/edit', 'ArticleController@edit')->name('edit');
        Route::put('/{alias}', 'ArticleController@update')->name('update');
        Route::delete('/{alias}', 'ArticleController@destroy')->name('destroy');
    });

    Route::name('portfolios.')->prefix('portfolios')->group(function (){
        Route::get('/', 'PortfolioController@index')->name('index');
        Route::get('/create', 'PortfolioController@create')->name('create');
        Route::post('/', 'PortfolioController@store')->name('store');
        Route::get('/{alias}', 'PortfolioController@show')->name('show');
        Route::get('/{alias}/edit', 'PortfolioController@edit')->name('edit');
        Route::put('/{alias}', 'PortfolioController@update')->name('update');
        Route::delete('/{alias}', 'PortfolioController@destroy')->name('destroy');
    });

});
