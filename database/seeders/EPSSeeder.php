<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EPSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('eps_affiliates')->insert([
         ['name'=>'Emssanar'],
         ['name' =>'Mallamas'],
         ['name'=>'Nueva EPS'],
         ['name'=>'Sanitas'],
         ['name'=>'Asmet Salud'],
         ['name'=>'Magisterio'],
         ['name'=>'Famisanar'],
         ['name'=>'Inpec'],
         ['name'=>'Unariño'],
         ['name'=>'Ferrocarriles Nales'],
         ['name'=>'Ecopetrol'],
         ['name'=>'Suramericana'],
         ['name'=>'Unisalud'],         
         ['name'=>'EPS Fliar Colombia'],         
         ['name'=>'Salud Total'],         
         ['name'=>'Uvalle']             
        ]);
        //
    }
}
