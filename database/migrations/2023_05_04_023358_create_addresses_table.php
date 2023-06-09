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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phoneNumber');
            $table->string('building');
            $table->string('landmark')->nullable();
            $table->string('address');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('township_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->boolean('setDefault');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('township_id')->references('id')->on('townships')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade');
            $table->softDeletes();
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
