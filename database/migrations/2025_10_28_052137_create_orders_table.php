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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orderId'); // Primary Key
            $table->foreignId('userId')->nullable()->constrained('users', 'userId')->onDelete('set null');
            $table->foreignId('shippingId')->nullable()->constrained('shipping_addresses', 'shippingId')->onDelete('set null');
            $table->string('transactionId')->nullable()->unique();
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
