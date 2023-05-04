<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TownshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $yangon_city = DB::table('cities')
                ->join('regions', 'regions.id', '=', 'cities.region_id')
                ->where('cities.name', 'Yangon')
                ->select('cities.id')
                ->first();

        $yangon_city_id = $yangon_city->id;

        $townships = [
            ['name' => 'Ahlon', 'city_id' => $yangon_city_id],
            ['name' => 'Bahan', 'city_id' => $yangon_city_id],
            ['name' => 'Botataung', 'city_id' => $yangon_city_id],
            ['name' => 'Dagon Seikkan', 'city_id' => $yangon_city_id],
            ['name' => 'Dagon', 'city_id' => $yangon_city_id],
            ['name' => 'Dala', 'city_id' => $yangon_city_id],
            ['name' => 'Hlaing', 'city_id' => $yangon_city_id],
            ['name' => 'Hlegu', 'city_id' => $yangon_city_id],
            ['name' => 'Hmawbi', 'city_id' => $yangon_city_id],
            ['name' => 'Insein', 'city_id' => $yangon_city_id],
            ['name' => 'Kamaryut', 'city_id' => $yangon_city_id],
            ['name' => 'Kyauktada', 'city_id' => $yangon_city_id],
            ['name' => 'Kyauktan', 'city_id' => $yangon_city_id],
            ['name' => 'Kyeemyindaing', 'city_id' => $yangon_city_id],
            ['name' => 'Lanmadaw', 'city_id' => $yangon_city_id],
            ['name' => 'Latha', 'city_id' => $yangon_city_id],
            ['name' => 'Mayangon', 'city_id' => $yangon_city_id],
            ['name' => 'Mingaladon', 'city_id' => $yangon_city_id],
            ['name' => 'North Okkalapa', 'city_id' => $yangon_city_id],
            ['name' => 'Pabedan', 'city_id' => $yangon_city_id],
            ['name' => 'Pazundaung', 'city_id' => $yangon_city_id],
            ['name' => 'Sanchaung', 'city_id' => $yangon_city_id],
            ['name' => 'Seikgyikanaungto', 'city_id' => $yangon_city_id],
            ['name' => 'South Okkalapa', 'city_id' => $yangon_city_id],
            ['name' => 'Tamwe', 'city_id' => $yangon_city_id],
            ['name' => 'Thaketa', 'city_id' => $yangon_city_id],
            ['name' => 'Thanlyin', 'city_id' => $yangon_city_id],
            ['name' => 'Thingangyun', 'city_id' => $yangon_city_id],
            ['name' => 'Yankin', 'city_id' => $yangon_city_id],
        ];

        DB::table('townships')->insert($townships);
    }
}
