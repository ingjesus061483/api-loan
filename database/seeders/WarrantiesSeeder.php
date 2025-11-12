<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarrantiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warranties')->insert([
            ['name'=>'Letra'],
            ['name'=>'Pagaré'],
            ['name'=>'Palabra'],
            ['name'=>'Prenda de garantia'],
            ['name'=>'Clave virtual'],
            ['name'=>'Contrato de arriendo'],
            ['name'=>'Hipoteca'],
            ['name'=>'Pignoración'],
 
        ]);
        //
    }
}
