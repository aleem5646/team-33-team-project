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
        Schema::create('basket_items', function (Blueprint $table) {
            $table->id('basket_itemId');
            $table->foreignId('basketId')->constrained('baskets', 'basketId')->onDelete('cascade');
            $table->foreignId('product_variantId')->constrained('product_variants', 'product_variantId')->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basket_items');
    }
};
