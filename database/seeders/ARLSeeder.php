<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ARLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('arl_affiliates')->insert([
            ['name'=>'SEGUROS DE VIDA ALFA SA'],
            ['name'=>'LIBERTY SEGUROS DE VIDA'],
            ['name'=>'POSITIVA COMPAÑIA DE SEGUROS'],
            ['name'=>'RIESGOS PROFESIONALES COLMENA SA COMPAÑIA DE SEGUROS DE VIDA'],
            ['name'=>'ARP SURA'],
            ['name'=>'LA EQUIDAD SEGUROS DE VIDA ORGANISMO COOPERATIVO LA EQUIDAD VIDA'],
            ['name'=>'MAPFRE COLOMBIA VIDA SEGUROS SA'],
            ['name'=>'SEGUROS DE VIDA COLPATRIA SA'],
            ['name'=>'CIA DE SEGUROS BOLIVAR SA'],
            ['name'=>'COMPAÑIA DE SEGUROS DE VIDA AURORA']
        ]);
        //
    }
}
