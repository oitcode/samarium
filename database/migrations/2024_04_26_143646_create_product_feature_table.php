<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_feature', function (Blueprint $table) {
            $table->bigIncrements('product_feature_id');

            $table->string('feature');

            /*
             * Foreign key to product table.
             *
             */
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'fk_product_feature__product')
                ->references('product_id')->on('product');

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
        Schema::dropIfExists('product_feature');
    }
}
