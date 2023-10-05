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
            $table->id();
            $table->string('session_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nota_no')->unique();
            $table->string('name');
            $table->string('no_whatsapp');
            $table->string('email');
            $table->string('address');
            $table->text('notes')->nullable();
            $table->integer('total_price');
            $table->integer('discount')->nullable();
            $table->enum('order_type', ['Pick Up', 'Delivery']);
            $table->enum('schedule_type', ['immediate-order', 'scheduled-order'])->default('scheduled-order');
            $table->date('delivery_date');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
