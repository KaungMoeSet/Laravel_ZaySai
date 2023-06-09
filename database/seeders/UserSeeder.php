<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create([
            'password' => bcrypt('11111111'),
        ]);

        $user1 = User::create([
            'name'  => 'Kaung Moe Set',
            'email' => 'kaungmoeset22work@gmail.com',
            'password' => bcrypt('11111111'),
        ]);
    }
}