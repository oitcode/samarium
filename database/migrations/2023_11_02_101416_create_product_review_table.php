<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_review', function (Blueprint $table) {
            $table->bigIncrements('product_review_id');

            /*
             * Foreign key to product table.
             */
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'fk_product_review__product')
                ->references('product_id')->on('product');

            $table->string('writer_name');
            $table->string('writer_info');
            $table->integer('rating');
            $table->text('review_text');

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
        Schema::dropIfExists('product_review');
    }
}
