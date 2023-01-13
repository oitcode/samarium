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

            $table->string('ascent_bg_color');
            $table->string('ascent_text_color');

            $table->string('top_header_bg_color');
            $table->string('top_header_text_color');

            $table->string('footer_bg_color');
            $table->string('footer_text_color');

            $table->string('heading_color');
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
