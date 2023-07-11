<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JalurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jalurs')->insert(
            [
                [
                    'jalur'  => 'Umum',
                ],
                [
                    'jalur'  => 'Raport',
                ],
            ]
        );
    }
}
