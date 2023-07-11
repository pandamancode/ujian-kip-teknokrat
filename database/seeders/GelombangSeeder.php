<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GelombangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gelombangs')->insert(
            [
                [
                    'tahun'  => '2023',
                    'gelombang'  => 'I',
                    'tanggal_akhir'  => Carbon::create('2023', '06', '01'),
                    'status'  => 'aktif',
                ],
            ]
        );
    }
}
