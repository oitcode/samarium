<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_image', function (Blueprint $table) {
            $table->bigIncrements('gallery_image_id');
            $table->string('image_path');

            /*
             * Foreign key to gallery table.
             */
            $table->unsignedBigInteger('gallery_id');
            $table->foreign('gallery_id', 'fk_gallery_image_gallery')
                ->references('gallery_id')->on('gallery');

            $table->timestamps();
            $table->string('comment', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_image');
    }
}
