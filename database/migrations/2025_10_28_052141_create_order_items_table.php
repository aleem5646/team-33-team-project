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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_itemId');
            $table->foreignId('orderId')->constrained('orders', 'orderId')->onDelete('cascade');
            $table->foreignId('product_variantId')->constrained('product_variants', 'product_variantId');
            $table->unsignedInteger('quantity');
            $table->decimal('price', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
