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
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id('transactionId');
            $table->foreignId('product_variantId')->nullable()->constrained('product_variants', 'product_variantId');
            $table->foreignId('processed_by')->nullable()->constrained('users', 'userId')->onDelete('set null');
            $table->unsignedInteger('quantity');
            $table->enum('transaction_type', ['incoming', 'outgoing']);
            $table->string('reference'); //context to transaction
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_transactions');
    }
};
