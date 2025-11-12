<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this-> call([
            CompanyPaymentDatesSeeder::class,
            ContractTypesSeeder::class,
            CustomerPaymentDatesSeeder::class,
            LevelStudiesSeeder::class,
            martitalStatusSeeder::class,
            UserSeeder::class,
            PaymentFrequencySeeder::class,
            PhonetypesSeeder::class,
            QualityHolderSeeder::class,
            EPSSeeder::class,
            ARLSeeder::class,
            WarrantiesSeeder::class,]);
      
    }
}
