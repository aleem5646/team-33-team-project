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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id('shippingId');
            $table->foreignId('userId')->nullable()->constrained('users', 'userId')->onDelete('set null');
            $table->string('address_line');
            $table->string('city');
            $table->string('postcode');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
