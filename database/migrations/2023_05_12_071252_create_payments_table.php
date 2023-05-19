<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->string('payment_screenshot');
            $table->date('paid_at')->nullable();

            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->index('order_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
