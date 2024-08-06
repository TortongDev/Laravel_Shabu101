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
        Schema::create('food_discounts', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_food_id');
            $table->integer('discount_persent');
            $table->string('date_form');
            $table->string('date_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_discounts');
    }
};
