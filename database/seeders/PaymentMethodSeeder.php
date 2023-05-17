<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PaymentMethod::create([
            'acc_name' => 'Kaung Moe Set',
            'acc_number' => '0912345678',
            'acc_type' => 'Mobile Banking',
            'bank_name' => 'KBZ',
            'image' => 'kpay.png',
        ]);

        PaymentMethod::create([
            'acc_name' => 'Moe Set Kaung',
            'acc_number' => '0912345678',
            'acc_type' => 'Mobile Banking',
            'bank_name' => 'KBZ',
            'image' => 'kpay.png',
        ]);

        PaymentMethod::create([
            'acc_name' => 'Kaung Moe Set',
            'acc_number' => '0912345678',
            'acc_type' => 'Mobile Banking',
            'bank_name' => 'CB',
            'image' => 'cb.png',
        ]);

        PaymentMethod::create([
            'acc_name' => 'Moe Set Kaung',
            'acc_number' => '0912345678',
            'acc_type' => 'Savings',
            'bank_name' => 'Wave Pay',
            'image' => 'wave.png',
        ]);
    }
}
