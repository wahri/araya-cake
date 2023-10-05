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
        Schema::create('category_products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('big_icon')->nullable();
            $table->string('small_icon')->nullable();
            $table->unsignedBigInteger('image_storage_id')->nullable();
            $table->boolean('is_primary');
            $table->timestamps();

            $table->foreign('image_storage_id')->references('id')->on('image_storages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_products');
    }
};
