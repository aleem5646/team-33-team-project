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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id('product_variantId'); 
            $table->foreignId('productId')->constrained('products', 'productId')->onDelete('cascade');
            $table->string('name')->nullable(); 
            $table->string('value')->nullable(); 
            $table->integer('count'); 
            $table->string('sku')->unique()->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};