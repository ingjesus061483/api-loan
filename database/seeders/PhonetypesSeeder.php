<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhonetypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phone_types')->insert([
            ['name'=>'Celular','description'=>''],
            ['name'=>'WhatsApp','decripcion'=>''],
            ['name'=>'Fijo','description'=>''],
            ['name'=>'Corporativo','description'=>'']            
        ]);
        //
    }
}
