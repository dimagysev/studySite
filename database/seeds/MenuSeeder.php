<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Models\Category::all();

        DB::table('menus')->insert([
            'title' => \Illuminate\Support\Str::upper('Home'),
            'link' => env('APP_URL') . '/',
            'parent' => 0
        ]);
        DB::table('menus')->insert([
            'title' => \Illuminate\Support\Str::upper('Articles'),
            'link' => env('APP_URL') . '/articles',
            'parent' => 0
        ]);
        foreach ($categories as $category) {
            DB::table('menus')->insert([
                'title' => \Illuminate\Support\Str::upper($category->title),
                'link' => env('APP_URL') . '/articles/category/' . $category->alias,
                'parent' => 2
            ]);
        }
        DB::table('menus')->insert([
            'title' => \Illuminate\Support\Str::upper('Portfolios'),
            'link' => env('APP_URL') . '/portfolios',
            'parent' => 0
        ]);
        DB::table('menus')->insert([
            'title' => \Illuminate\Support\Str::upper('Contacts'),
            'link' => env('APP_URL') . '/contacts',
            'parent' => 0
        ]);
        DB::table('menus')->insert([
            'title' => \Illuminate\Support\Str::upper('Login'),
            'link' => env('APP_URL') . '/login',
            'parent' => 0
        ]);
    }
}
