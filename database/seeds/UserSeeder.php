<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'name'=> 'Администратор',
            'email' => 'admin@admin.com',
            'login' => 'admin',
            'password' => bcrypt('123321123'),

        ])->each(function ($user) {
            $user->roles()->save(\App\Models\Role::query()->create(['name' => 'ADMIN']));
        });
        factory(\App\Models\User::class, 10)->create();
    }
}
