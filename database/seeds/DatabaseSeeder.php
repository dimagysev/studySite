<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Faker\Factory::create('ru_RU');
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(FilterSeeder::class);
        $this->call(ArticelSeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(MenuSeeder::class);
        //$this->call(ModelSeeder::class);

    }
}
