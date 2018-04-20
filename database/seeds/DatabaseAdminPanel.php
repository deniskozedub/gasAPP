<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseAdminPanel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'admin',
            'email' =>'admin@gmail.com',
            'password' => '111111',
        ]);
        DB::table('roles')->insert([
            'name' => 'admin'
        ]);
    }

}
