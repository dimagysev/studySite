<?php

use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Portfolio::class,10)->create()
            ->each(function ($portfolio){
                $portfolio->filters()->attach([random_int(1,10), random_int(11,20)]);
            });
    }
}
