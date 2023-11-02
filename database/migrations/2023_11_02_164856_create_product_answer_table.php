<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_answer', function (Blueprint $table) {
            $table->bigIncrements('product_answer_id');

            /*
             * Foreign key to product table.
             */
            $table->unsignedBigInteger('product_question_id');
            $table->foreign('product_question_id', 'fk_product_answer__product_question')
                ->references('product_question_id')->on('product_question');

            $table->string('writer_name')->nullable();
            $table->string('writer_info')->nullable();

            $table->text('answer_text');

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
        Schema::dropIfExists('product_answer');
    }
}
