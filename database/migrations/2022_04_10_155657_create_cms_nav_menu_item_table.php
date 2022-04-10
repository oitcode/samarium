<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsNavMenuItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_nav_menu_item', function (Blueprint $table) {
            $table->bigIncrements('cms_nav_menu_item_id');

            /*
             * Foreign key to cms_nav_menu table.
             */
            $table->unsignedBigInteger('cms_nav_menu_id');
            $table->foreign('cms_nav_menu_id', 'fk_cms_nav_menu_item__cms_nav_menu')
                ->references('cms_nav_menu_id')->on('cms_nav_menu');

            $table->integer('order');
            $table->string('name');

            /*
             * Foreign key to webpage table.
             */
            $table->unsignedBigInteger('webpage_id');
            $table->foreign('webpage_id', 'fk_cms_nav_menu_item__webpage')
                ->references('webpage_id')->on('webpage');

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
        Schema::dropIfExists('cms_nav_menu_item');
    }
}
