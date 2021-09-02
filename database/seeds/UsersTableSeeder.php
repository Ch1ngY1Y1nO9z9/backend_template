<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "OAOAdmin",
            'email' => 'OAOAdmin@gmail.com',
            'password' => bcrypt('1qazse432')
        ]);

        DB::table('users')->insert([
            'name' => "HmitAdmin",
            'email' => 'HmitAdmin@gmail.com',
            'password' => bcrypt('1qazse432')
        ]);

        DB::table('users')->insert([
            'name' => "Admin",
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('1qazse432')
        ]);

        DB::table('seo')->insert([
            'page' => "1",
            'keyword' => 'seo',
            'title' => 'seo'
        ]);

    }
}
