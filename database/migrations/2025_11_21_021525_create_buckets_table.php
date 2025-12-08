<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buckets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('image', 255);
            $table->string('category', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buckets');
    }
};