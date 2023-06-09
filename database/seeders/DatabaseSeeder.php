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
        $this->call([
            AdminSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            RegionsSeeder::class,
            TownshipsSeeder::class,
            DeliveryFeeSeeder::class,
            PaymentMethodSeeder::class,
            AddressSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
