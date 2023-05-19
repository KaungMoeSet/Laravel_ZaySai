<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Address;
use App\Models\Payment;
use App\Models\Product;
use App\Models\DeliveryFees;
use App\Models\PaymentMethod;
use App\Models\PaymentConfirm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users              = User::all();
        $paymentMethodCount = PaymentMethod::count();

        foreach ($users as $user) {
            $address = Address::where('user_id', $user->id)->where('setDefault', true)->first();

            if (!$address) {
                continue; // Skip this user if no address with setDefault value found
            }

            $deliveryFee = $this->getDeliveryFee($address);
            $currentYear = Carbon::now()->year;

            for ($i = 0; $i < 10; $i++) {
                $randomDate  = Carbon::create($currentYear, random_int(1, Carbon::now()->month), random_int(1, Carbon::now()->day));
                $orderNumber = '#' . $currentYear . $user->id . rand(100000, 999999);

                $order               = new Order();
                $order->order_number = $orderNumber;
                $order->user_id      = $user->id;
                $order->address_id   = $address->id;
                $order->deli_fee     = $deliveryFee;
                $order->order_status = ['pending', 'processing', 'delivered'][random_int(0, 2)];
                $order->order_date   = $randomDate;
                $order->save();

                $products = Product::with([
                    'selling_prices' => function ($query) use ($order) {
                        $query->where(function ($query) use ($order) {
                            $query->whereNull('end_date')->orWhere('end_date', '>=', $order->created_at);
                        });
                    }
                ])
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();

                foreach ($products as $product) {
                    $quantity = random_int(1, 5);

                    $order->products()->attach($product->id, ['quantity' => $quantity]);
                }

                $totalAmount = $order->products->sum(function ($product) use ($order) {
                    $sellingPrice = $product->selling_prices->isEmpty()
                        ? null
                        : $product->selling_prices->first()->selling_price;

                    return $product->pivot->quantity * $sellingPrice;
                });
                // dd($totalAmount);

                $randomPaymentMethodId = random_int(1, $paymentMethodCount);

                $payment = Payment::create([
                    'payment_method_id'  => $randomPaymentMethodId,
                    'payment_screenshot' => 'rc.png',
                    'paid_at'            => $randomDate,
                    'order_id'           => $order->id,
                ]);

                $confirmCancelDate = $randomDate->copy()->addHours(random_int(1, 24));

                $adminCount    = Admin::count();
                $randomAdminId = random_int(1, $adminCount);

                $paymentConfirm = PaymentConfirm::create([
                    'payment_id'          => $payment->id,
                    'admin_id'            => $randomAdminId,
                    'confirm_cancel_date' => $confirmCancelDate,
                    'confirm_status'      => ['pending', 'accepted', 'rejected'][random_int(0, 2)],
                    'total_amount'        => $totalAmount,
                ]);
            }
        }
    }

    private function getDeliveryFee($address)
    {
        if ($address->city->townships()->exists()) {
            // City has townships, get the fee from delivery_fees table based on the township_id
            $deliveryFee = DeliveryFees::where('township_id', $address->township_id)->value('fee');
        } else {
            // City doesn't have townships, use the default fee
            $deliveryFee = 3000;
        }

        return $deliveryFee;
    }
}