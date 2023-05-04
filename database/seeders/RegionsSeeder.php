<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $regions = [
            ['name' => 'Ayeyarwady'],
            ['name' => 'Bago'],
            ['name' => 'Chin'],
            ['name' => 'Kachin'],
            ['name' => 'Kayah'],
            ['name' => 'Kayin'],
            ['name' => 'Magway'],
            ['name' => 'Mandalay'],
            ['name' => 'Mon'],
            ['name' => 'Rakhine'],
            ['name' => 'Sagaing'],
            ['name' => 'Shan'],
            ['name' => 'Tanintharyi'],
            ['name' => 'Yangon'],
        ];

        foreach ($regions as $region) {
            $region_id = DB::table('regions')->insertGetId($region);

            switch ($region['name']) {
                case 'Ayeyarwady':
                    $cities = ['Pathein', 'Ma-ubin', 'Myaungmya', 'Hinthada', 'Labutta'];
                    break;
                case 'Bago':
                    $cities = ['Bago', 'Pyay', 'Tharrawaddy', 'Taungoo', 'Kawa'];
                    break;
                case 'Chin':
                    $cities = ['Hakha', 'Falam', 'Tonzang', 'Tedim', 'Matupi'];
                    break;
                case 'Kachin':
                    $cities = ['Myitkyina', 'Bhamo', 'Putao', 'Mohnyin', 'Shwegu'];
                    break;
                case 'Kayah':
                    $cities = ['Loikaw', 'Bawlakhe', 'Demoso', 'Shadaw', 'Hpruso'];
                    break;
                case 'Kayin':
                    $cities = ['Hpa-an', 'Myawaddy', 'Kawkareik', 'Kyain Seikgyi', 'Thandaunggyi'];
                    break;
                case 'Magway':
                    $cities = ['Magway', 'Minbu', 'Pakokku', 'Thayet', 'Gangaw'];
                    break;
                case 'Mandalay':
                    $cities = ['Mandalay', 'Meiktila', 'Pyin Oo Lwin', 'Myingyan', 'Sagaing'];
                    break;
                case 'Mon':
                    $cities = ['Mawlamyine', 'Thaton', 'Ye', 'Chaungzon', 'Kyaikmaraw'];
                    break;
                case 'Rakhine':
                    $cities = ['Sittwe', 'Thandwe', 'Kyaukpyu', 'Mrauk U', 'Gwa'];
                    break;
                case 'Sagaing':
                    $cities = ['Sagaing', 'Shwebo', 'Kale', 'Monywa', 'Katha'];
                    break;
                case 'Shan':
                    $cities = ['Taunggyi', 'Lashio', 'Kengtung', 'Tachileik', 'Muse'];
                    break;
                case 'Tanintharyi':
                    $cities = ['Dawei', 'Myeik', 'Kawthaung', 'Thayetchaung', 'Bokpyin'];
                    break;
                case 'Yangon':
                    $cities = ['Yangon', 'Bago', 'Thanlyin'];
            }

            $cityData = [];
            foreach ($cities as $city) {
                $cityData[] = [
                    'name'      => $city,
                    'region_id' => $region_id,
                ];
            }

            DB::table('cities')->insert($cityData);
        }
    }
}