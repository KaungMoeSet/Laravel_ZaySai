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
        Schema::create('payment_confirms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->timestamp('confirm_cancel_date')->nullable();
            $table->longText('reject_reason')->nullable();
            $table->enum('confirm_status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->decimal('total_amount', 8, 2);
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_confirms');
    }
};
