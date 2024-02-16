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
            $table->string('image');
            $table->string('relative_image');
            $table->string('product_name');
            $table->string('price');
            $table->enum('storage',['6/128','8/256','8/128']);
            $table->boolean('discount_flag');
            $table->string('discount');
            $table->string('dimension');
            $table->longText('description');
            $table->string('display');
            $table->string('camera');
            $table->string('battery');
            $table->string('consistency');
            $table->string('chip_set');
            $table->longText('other_specification');
            $table->timestamps();
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
