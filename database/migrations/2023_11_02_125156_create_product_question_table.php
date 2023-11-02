<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_question', function (Blueprint $table) {
            $table->bigIncrements('product_question_id');

            /*
             * Foreign key to product table.
             */
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'fk_product_question__product')
                ->references('product_id')->on('product');

            $table->string('writer_name')->nullable();
            $table->string('writer_info')->nullable();

            $table->text('question_text');

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
        Schema::dropIfExists('product_question');
    }
}
