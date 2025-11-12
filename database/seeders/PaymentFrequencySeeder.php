<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_frequency')->insert([
            ['name'=> 'Semanal','description'=>''],
            ['name'=>'Quincenal','description'=>''],
            ['name'=>'Mensual','description'=>''],           
        ]);
        //
    }
}
