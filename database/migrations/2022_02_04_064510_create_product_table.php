<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('product_id');

            $table->string('name')->unique();

            /*
             * Foreign key to product_category table.
             */
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id', 'fk_product_product_category')
                ->references('product_category_id')->on('product_category');

            $table->integer('selling_price');
            $table->string('image_path');

            $table->integer('stock_count')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
