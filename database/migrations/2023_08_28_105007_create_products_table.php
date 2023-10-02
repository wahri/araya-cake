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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->decimal('length', 10, 2);
            $table->decimal('width', 10, 2);
            $table->decimal('height', 10, 2);
            $table->integer('price')->nullable();
            $table->integer('discount')->nullable();
            $table->boolean('is_premium')->nullable();
            $table->boolean('has_message')->nullable();
            $table->boolean('has_decoration')->nullable();
            $table->text('information')->nullable();
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->unsignedBigInteger('category_product_id');
            $table->unsignedBigInteger('sub_category_product_id');
            $table->unsignedBigInteger('pilihan_type_id')->nullable();
            $table->unsignedBigInteger('pilihan_color_id')->nullable();
            $table->timestamps();

            $table->foreign('category_product_id')->references('id')->on('category_products')->onDelete('cascade');
            $table->foreign('sub_category_product_id')->references('id')->on('sub_category_products')->onDelete('cascade');
            $table->foreign('pilihan_type_id')->references('id')->on('pilihan_types')->onDelete('cascade');
            $table->foreign('pilihan_color_id')->references('id')->on('pilihan_colors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
