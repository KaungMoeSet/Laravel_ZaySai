<?php
// app/Models/Cart.php

namespace App\Models;

use App\Models\Product;

class Cart
{
    protected $items = [];
    protected $totalQty = 0;
    protected $totalPrice = 0;

    public function __construct()
    {
        $cart = session('cart');

        if ($cart) {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        }
    }

    public function add(Product $product, $quantity = 1)
    {
        $item = [
            'product_id' => $product->id,
            'name' => $product->name,
            'price' => $product->selling_price,
            'quantity' => 0,
        ];

        if (isset($this->items[$product->id])) {
            $item = $this->items[$product->id];
        }

        $item['quantity'] += $quantity;
        $item['price'] = $product->selling_price * $item['quantity'];

        $this->items[$product->id] = $item;
        $this->totalQty += $quantity;
        $this->totalPrice += $product->selling_price * $quantity;

        $this->save();
    }

    public function update($product_id, $quantity)
    {
        if (isset($this->items[$product_id])) {
            $item = $this->items[$product_id];
            $this->totalQty -= $item['quantity'];
            $this->totalPrice -= $item['price'];
            $item['quantity'] = $quantity;
            $item['price'] = $item['price'] * $quantity;
            $this->totalQty += $quantity;
            $this->totalPrice += $item['price'];

            $this->items[$product_id] = $item;

            $this->save();
        }
    }

    public function remove($product_id)
    {
        if (isset($this->items[$product_id])) {
            $item = $this->items[$product_id];
            $this->totalQty -= $item['quantity'];
            $this->totalPrice -= $item['price'];
            unset($this->items[$product_id]);

            $this->save();
        }
    }

    public function clear()
    {
        session()->forget('cart');
    }

    public function items()
    {
        return $this->items;
    }

    public function totalQty()
    {
        return $this->totalQty;
    }

    public function totalPrice()
    {
        return $this->totalPrice;
    }

    protected function save()
    {
        session(['cart' => $this]);
    }
}
