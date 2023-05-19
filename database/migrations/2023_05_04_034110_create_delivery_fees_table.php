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
        Schema::create('delivery_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('township_id')->nullable();
            $table->decimal('fee', 8, 2);
            $table->date('start_date')->useCurrent();
            $table->date('end_date')->nullable();
            $table->timestamps();
        
            $table->foreign('township_id')->references('id')->on('townships')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_fees');
    }
};
