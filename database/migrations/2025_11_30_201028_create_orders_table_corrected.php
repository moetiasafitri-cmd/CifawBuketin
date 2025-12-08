<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name'); // ✅
            $table->string('customer_phone'); // ✅
            $table->text('customer_address'); // ✅
            $table->string('product_name'); // ✅
            $table->decimal('product_price', 10, 2); // ✅
            $table->decimal('total_price', 10, 2); // ✅
            $table->enum('status', ['pending', 'accepted', 'completed', 'cancelled'])->default('pending'); // ✅
            $table->timestamp('order_date'); // ✅
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};