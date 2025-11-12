<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ContractTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contract_types')->insert([
         ['name'=>'Indefinido','description'=>''],
         ['name'=>'Prestacion de servicios','description'=>''],
         ['name'=>'Termino fijo','description'=>''],
      

        ]);

        //
    }
}
