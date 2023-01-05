<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_theme', function (Blueprint $table) {
            $table->bigIncrements('cms_theme_id');
            $table->string('name');
            $table->string('top_header_color');
            $table->string('footer_color');
            $table->string('hero_image_path');

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
        Schema::dropIfExists('cms_theme');
    }
}
