<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option', function (Blueprint $table) {
            $table->bigIncrements('product_option_id');

            $table->string('product_option_name');

            /*
             * Foreign key to product table.
             *
             */
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'fk_product_option__product')
                ->references('product_id')->on('product');

            /*
             * Foreign key to product_feature_heading table.
             *
             */
            $table->unsignedBigInteger('product_option_heading_id')->nullable();
            $table->foreign('product_option_heading_id', 'fk_product_option__product_option_heading')
                ->references('product_option_heading_id')->on('product_option_heading');

            $table->integer('position');

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
        Schema::dropIfExists('product_option');
    }
}
