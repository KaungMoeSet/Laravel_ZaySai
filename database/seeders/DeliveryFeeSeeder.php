<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Set the default delivery fee for cities other than Yangon
        $defaultFee = 3000;

        // Get the Yangon City
        $yangonCity = DB::table('cities')->where('name', 'Yangon')->first();
        // dd($yangonCity->id);

        // Get all townships in Yangon
        $yangonTownships = DB::table('townships')->where('city_id', $yangonCity->id)->get();

        // Set a different delivery fee for each township in Yangon
        $townshipFees = [
            'Ahlon'  => 1000,
            'Bahan'  => 1000,
            'Botataung'  => 1000,
            'Dagon Seikkan'  => 1000,
            'Dagon'  => 1000,
            'Dala'  => 1000,
            'Hlaing'  => 1000,
            'Hlegu'  => 1000,
            'Hmawbi'  => 1000,
            'Insein'  => 1000,
            'Kamaryut'  => 1000,
            'Kyauktada'  => 1000,
            'Kyauktan'  => 1000,
            'Kyeemyindaing'  => 1000,
            'Lanmadaw'  => 1000,
            'Latha'  => 1000,
            'Mayangon'  => 1000,
            'Mingaladon'  => 1000,
            'North Okkalapa'  => 1000,
            'Pabedan'  => 1000,
            'Pazundaung'  => 1000,
            'Sanchaung'  => 1000,
            'Seikgyikanaungto'  => 1000,
            'South Okkalapa'  => 1000,
            'Tamwe'  => 1000,
            'Thaketa'  => 1000,
            'Thanlyin'  => 1000,
            'Thingangyun'  => 1000,
            'Yankin'  => 1000,
        ];

        // Loop through all cities and townships and set the delivery fee
        $cities = DB::table('cities')->get();
        foreach ($cities as $city) {
            if ($city->name === 'Yangon') {
                foreach ($yangonTownships as $township) {
                    DB::table('delivery_fees')->insert([
                        'township_id' => $township->id,
                        'fee' => $townshipFees[$township->name],
                        'start_date' => now(),
                    ]);
                }
            } 
        }

        // DB::table('delivery_fees')->insert([
        //     'fee' => $defaultFee,
        //     'start_date' => now(),
        // ]);
    }
}
