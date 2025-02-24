<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_profile')->insert([
            'addres'=>'Nganjuk',
            'nomor_tlp'=>'085894471947',
            'ttl'=>'2004-07-20',
            'foto'=>'foto.png'
        ]);//
    }
}
