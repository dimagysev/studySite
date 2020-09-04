<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(['name'=>'CREATE_ARTICLE']);
        DB::table('permissions')->insert(['name'=>'UPDATE_ARTICLE']);
        DB::table('permissions')->insert(['name'=>'DELETE_ARTICLE']);
        DB::table('permissions')->insert(['name'=>'CREATE_PORTFOLIO']);
        DB::table('permissions')->insert(['name'=>'UPDATE_PORTFOLIO']);
        DB::table('permissions')->insert(['name'=>'DELETE_PORTFOLIO']);
        DB::table('permissions')->insert(['name'=>'CREATE_CATEGORY']);
        DB::table('permissions')->insert(['name'=>'UPDATE_CATEGORY']);
        DB::table('permissions')->insert(['name'=>'DELETE_CATEGORY']);
        DB::table('permissions')->insert(['name'=>'CREATE_FILTER']);
        DB::table('permissions')->insert(['name'=>'UPDATE_FILTER']);
        DB::table('permissions')->insert(['name'=>'DELETE_FILTER']);
        DB::table('permissions')->insert(['name'=>'CREATE_SLIDER']);
        DB::table('permissions')->insert(['name'=>'UPDATE_SLIDER']);
        DB::table('permissions')->insert(['name'=>'DELETE_SLIDER']);
        DB::table('permissions')->insert(['name'=>'DELETE_COMMENT']);
        DB::table('permissions')->insert(['name'=>'EDIT_MENU']);
    }
}
