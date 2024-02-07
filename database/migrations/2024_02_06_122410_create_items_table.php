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
        Schema::create('items', function (Blueprint $table) {
            $table->increments('itemID'); // Changed to increments for auto-incrementing primary key
            $table->unsignedBigInteger('storeID'); // Unsigned integer for store ID
            $table->string('itemName');
            $table->float('itemPrice');
            $table->string('itemDescription');
            $table->integer('itemQuantity')->default(0); 
            
            // Define foreign key constraint
            $table->foreign('storeID')->references('storeID')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
