<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCmsThemeTableAddNavMenuOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_theme', function (Blueprint $table) {
            $table->string('nav_menu_bg_color')->after('top_header_text_color');
            $table->string('nav_menu_text_color')->after('nav_menu_bg_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_theme', function (Blueprint $table) {
            $table->dropColumn('nav_menu_text_color');
            $table->dropColumn('nav_menu_bg_color');
        });
    }
}
