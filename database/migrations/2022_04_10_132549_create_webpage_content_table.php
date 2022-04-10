<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebpageContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webpage_content', function (Blueprint $table) {
            $table->bigIncrements('webpage_content_id');

            /*
             * Foreign key to webpage table.
             */
            $table->unsignedBigInteger('webpage_id');
            $table->foreign('webpage_id', 'fk_webpage_content__webpage')
                ->references('webpage_id')->on('webpage');

            $table->text('body');
            $table->string('image_path');

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
        Schema::dropIfExists('webpage_content');
    }
}
