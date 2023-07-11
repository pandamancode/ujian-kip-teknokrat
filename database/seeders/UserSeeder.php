<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [
                [
                    'name'  => 'admin 01',
                    'level'  => 'admin',
                    'email' => 'admin@gmail.com',
                    'password'  => bcrypt('admin'),
                ]
            ]
        );
        DB::table('users')->insert(
            [
                [
                    'no_telepon'  => '081273663077',
                    'name'  => 'user 01',
                    'email' => 'user@gmail.com',
                    'password'  => bcrypt('user'),
                ]
            ]
        );
    }
}
