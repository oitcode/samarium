<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebpageQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webpage_question', function (Blueprint $table) {
            $table->bigIncrements('webpage_question_id');

            /*
             * Foreign key to webpage table.
             */
            $table->unsignedBigInteger('webpage_id');
            $table->foreign('webpage_id', 'fk_webpage_question__webpage')
                ->references('webpage_id')->on('webpage');

            $table->string('writer_name')->nullable();
            $table->string('writer_email');
            $table->string('writer_phone');

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
        Schema::dropIfExists('webpage_question');
    }
}
