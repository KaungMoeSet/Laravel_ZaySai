<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeroCarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $carousels = [
            [
                'title' => 'ပုဆိုး နဲ့ လုံချည်',
                'description' => 'Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Etiam pharetra laoreet dui quis
                molestie.',
                'image' => 'longyi.jpg',
            ],
            [
                'title' => 'toothpaste and Soap',
                'description' => 'Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Etiam pharetra laoreet dui quis
                molestie.',
                'image' => 'soap.jpg',
            ],
            [
                'title' => 'Sweets & Snacks',
                'description' => 'Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Etiam pharetra laoreet dui quis
                molestie.',
                'image' => 'kitkat.jpg'
            ]
            // Add more carousel data as needed
        ];

        foreach ($carousels as $carousel) {
            // Get the full path of the image in the public storage
            $imagePath = public_path('storage/' . $carousel['image']);

            // Upload the image to the storage if it doesn't exist
            if (!Storage::exists($carousel['image'])) {
                Storage::put($carousel['image'], file_get_contents($imagePath));
            }

            // Insert the carousel data into the "hero_carousels" table
            DB::table('hero_carousels')->insert([
                'title' => $carousel['title'],
                'description' => $carousel['description'],
                'image' => $carousel['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
