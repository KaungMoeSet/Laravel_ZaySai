<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $faker = Faker::create();

        // user 1
        $address1 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 3,
            'setDefault' => true,
            'user_id' => 1
        ]);

        $address2 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 66,
            'township_id' => 12,
            'setDefault' => false,
            'user_id' => 1
        ]);
        // user 1 end

        // user 2 start
        $address3 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 3,
            'setDefault' => true,
            'user_id' => 2
        ]);

        $address4 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 12,
            'setDefault' => false,
            'user_id' => 2
        ]);

        $address5 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 66,
            'township_id' => 5,
            'setDefault' => false,
            'user_id' => 2
        ]);
        // user 2 end

        // user 3 start
        $address6 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 3,
            'setDefault' => true,
            'user_id' => 3
        ]);

        $address7 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 12,
            'setDefault' => false,
            'user_id' => 3
        ]);
        // user 3 end

        // user 4 start
        $address8 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 12,
            'setDefault' => false,
            'user_id' => 4
        ]);
        // user 4 end

        // user 5 start
        $address9 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 17,
            'setDefault' => true,
            'user_id' => 5
        ]);

        $address10 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 66,
            'township_id' => 3,
            'setDefault' => false,
            'user_id' => 5
        ]);
        // user 5 end

        // user 6 start
        $address10 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 66,
            'township_id' => 18,
            'setDefault' => true,
            'user_id' => 6
        ]);
        // user 6 end

        // user 7 start
        $address11 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 65,
            'setDefault' => true,
            'user_id' => 7
        ]);

        $address12 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 67,
            'setDefault' => false,
            'user_id' => 7
        ]);

        $address13 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 35,
            'setDefault' => false,
            'user_id' => 7
        ]);
        // user 7 end

        // user 8 start
        $address14 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 23,
            'setDefault' => true,
            'user_id' => 8
        ]);

        $address15 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 47,
            'setDefault' => false,
            'user_id' => 8
        ]);
        // user 8 end

        // user 9 start
        $address16 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 66,
            'township_id' => 22,
            'setDefault' => true,
            'user_id' => 9
        ]);
        // user 9 end

        // user 10 start
        $address17 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 66,
            'township_id' => 12,
            'setDefault' => true,
            'user_id' => 10
        ]);

        $address18 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 33,
            'setDefault' => false,
            'user_id' => 10
        ]);

        $address19 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 66,
            'township_id' => 12,
            'setDefault' => false,
            'user_id' => 10
        ]);

        $address20 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 29,
            'setDefault' => false,
            'user_id' => 10
        ]);
        // user 10 end

        // user 11 start
        $address19 = Address::create([
            'name' => $faker->name,
            'phoneNumber' => $faker->phoneNumber,
            'building' => $faker->buildingNumber,
            'landmark' => $faker->optional()->word,
            'address' => $faker->address,
            'city_id' => 66,
            'township_id' => 12,
            'setDefault' => true,
            'user_id' => 11
        ]);
        // user 11 start
    }

    
}
