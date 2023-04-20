<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');

            $table->string('region');
            $table->string('city');
            $table->string('township');
            $table->string('receiver_name', 30);
            $table->integer('phone');
            $table->string('location'); // Building/ House No/ Floor/ Street
            $table->string('area')->nullable(); // Colony/ Suburb/ Locality/ Landmark
            $table->string('address'); // Address

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};