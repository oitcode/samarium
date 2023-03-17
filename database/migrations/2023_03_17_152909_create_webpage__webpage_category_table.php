<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebpageWebpageCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webpage__webpage_category', function (Blueprint $table) {
            $table->bigIncrements('webpage__webpage_category_id');

            $table->bigInteger('webpage_id');
            $table->bigInteger('webpage_category_id');

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
        Schema::dropIfExists('webpage__webpage_category');
    }
}
