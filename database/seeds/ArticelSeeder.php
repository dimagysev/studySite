<?php

use Illuminate\Database\Seeder;

class ArticelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        factory(\App\Models\Article::class,10)->create()
            ->each(function ($article){
            $article->user()->associate(random_int(1,10));
            $article->category()->associate(random_int(1,5));
            $article->filters()->attach([random_int(1,10), random_int(11,20)]);
        });
    }
}
