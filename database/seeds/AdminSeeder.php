<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'                => 'Admin',
            'email'               => 'adityachouhan81@gmail.com',
            'password'            => bcrypt('Admin#@123'),
            'role'                => 'admin',
            'registration_status' => 1,
        ]);
        DB::table('users')->insert([
            'name'                => 'poonam',
            'email'               => 'poonammk97@gmail.com',
            'password'            => bcrypt('poonam'),
            //            'role' => 'admin',
            'registration_status' => 1,
        ]);
    }
}
