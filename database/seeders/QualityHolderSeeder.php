<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualityHolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quality_holders')->insert([
            ['name'=>'Deudor titular','description'=>''],
            ['name'=>'Fiador solidario','description'=>''], 
            ['name'=>'Fiador solidario cruzado','description'=>''],                                
        ]);
        //
    }
}
