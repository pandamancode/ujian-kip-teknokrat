<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Fakultasprodiseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fakultas')->insert(
            [
                [
                    'kode_fakultas'  => 'KF001',
                    'nama_fakultas'  => 'Fakultas Teknik Dan Ilmu Komputer',
                    'nama_english_fakultas'  => 'Faculty of Engineering and Computer Sciences',
                    'singkatan_fakultas'  => 'FTIK',
                    'keterangan_fakultas'  => '-',
                ],
                [
                    'kode_fakultas'  => 'KF002',
                    'nama_fakultas'  => 'Fakultas Sastra dan Ilmu Pendidikan',
                    'nama_english_fakultas'  => 'Faculty of Literature and Education',
                    'singkatan_fakultas'  => 'FSIP',
                    'keterangan_fakultas'  => '-',
                ],
                [
                    'kode_fakultas'  => 'KF003',
                    'nama_fakultas'  => 'Fakultas Ekonomi Dan Bisnis',
                    'nama_english_fakultas'  => 'Faculty of Economic and Business',
                    'singkatan_fakultas'  => 'FEB',
                    'keterangan_fakultas'  => '-',
                ],
            ]
        );

        DB::table('programstudis')->insert(
            [
                [
                    'id' => '10',
                    'kode_program_studi' => '412',
                    'nama_program_studi' => "S1 Akuntansi",
                    'nama_english_program_studi' => "S1 Accounting",
                    'status_program_studi_karyawan' => "Tidak Aktif",
                    'fakultas_id' => '3',
                ],
                [
                    'id' => '9',
                    'kode_program_studi' => '411',
                    'nama_program_studi' => "S1 Manajemen",
                    'nama_english_program_studi' => "S1 Management",
                    'status_program_studi_karyawan' => "Aktif",
                    'fakultas_id' => '3',
                ],
                [
                    'id' => '12',
                    'kode_program_studi' => '113',
                    'nama_program_studi' => "S1 Pendidikan Bahasa Inggris",
                    'nama_english_program_studi' => "S1 English Education",
                    'status_program_studi_karyawan' => "Aktif",
                    'fakultas_id' => '2',
                ],
                [
                    'id' => '14',
                    'kode_program_studi' => '112',
                    'nama_program_studi' => "S1 Pendidikan Matematika",
                    'nama_english_program_studi' => "S1 Mathematics Education",
                    'status_program_studi_karyawan' => "Tidak Aktif",
                    'fakultas_id' => '2',
                ],
                [
                    'id' => '13',
                    'kode_program_studi' => '114',
                    'nama_program_studi' => "S1 Pendidikan Olahraga",
                    'nama_english_program_studi' => "S1 Physical Education",
                    'status_program_studi_karyawan' => "Tidak Aktif",
                    'fakultas_id' => '2',
                ],
                [
                    'id' => '11',
                    'kode_program_studi' => '111',
                    'nama_program_studi' => "S1 Sastra Inggris",
                    'nama_english_program_studi' => "S1 English Literature",
                    'status_program_studi_karyawan' => "Aktif",
                    'fakultas_id' => '2',
                ],
                [
                    'id' => '2',
                    'kode_program_studi' => '311',
                    'nama_program_studi' => "S1 Sistem Informasi",
                    'nama_english_program_studi' => "S1 Information Systems",
                    'status_program_studi_karyawan' => "Aktif",
                    'fakultas_id' => '1',
                ],
                [
                    'id' => '1',
                    'kode_program_studi' => '312',
                    'nama_program_studi' => "S1 Informatika",
                    'nama_english_program_studi' => "S1 Informatics",
                    'status_program_studi_karyawan' => "Aktif",
                    'fakultas_id' => '1',
                ],
                [
                    'id' => '6',
                    'kode_program_studi' => '315',
                    'nama_program_studi' => "S1 Teknik Elektro",
                    'nama_english_program_studi' => "S1 Electrical Engineering",
                    'status_program_studi_karyawan' => "Aktif",
                    'fakultas_id' => '1',
                ],
                [
                    'id' => '5',
                    'kode_program_studi' => '316',
                    'nama_program_studi' => "S1 Teknik Komputer",
                    'nama_english_program_studi' => "S1 Computer Engineering",
                    'status_program_studi_karyawan' => "Tidak Aktif",
                    'fakultas_id' => '1',
                ],
                [
                    'id' => '7',
                    'kode_program_studi' => '314',
                    'nama_program_studi' => "S1 Teknik Sipil",
                    'nama_english_program_studi' => "S1 Civil Engineering",
                    'status_program_studi_karyawan' => "Tidak Aktif",
                    'fakultas_id' => '1',
                ],
                [
                    'id' => '3',
                    'kode_program_studi' => '313',
                    'nama_program_studi' => "S1 Teknologi Informasi",
                    'nama_english_program_studi' => "S1 Information technology",
                    'status_program_studi_karyawan' => "Tidak Aktif",
                    'fakultas_id' => '1',
                ],
                [
                    'id' => '8',
                    'kode_program_studi' => '231',
                    'nama_program_studi' => "D3 Sistem Informasi Akuntansi",
                    'nama_english_program_studi' => "D3 Information Systems Accounting",
                    'status_program_studi_karyawan' => "Tidak Aktif",
                    'fakultas_id' => '1',
                ],
            ]
        );
    }
}
