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
        Schema::create('webpage__product_category', function (Blueprint $table) {
            $table->bigIncrements('webpage__product_category_id');

            $table->bigInteger('webpage_id');
            $table->bigInteger('product_category_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webpage__product_category');
    }
};
