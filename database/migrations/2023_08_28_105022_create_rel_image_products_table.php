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
        Schema::create('rel_image_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('image_storage_id');
            $table->unsignedBigInteger('product_id');
            
            $table->foreign('image_storage_id')->references('id')->on('image_storages')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_image_products');
    }
};
