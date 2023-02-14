<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWebpageContentTableMakeNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webpage_content', function (Blueprint $table) {
            $table->text('title')->after('position')->nullable()->change();
            $table->text('body')->after('title')->nullable()->change();
            $table->string('image_path')->after('body')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webpage_content', function (Blueprint $table) {
            $table->text('title')->after('position')->nullable(false)->change();
            $table->text('body')->after('title')->nullable(false)->change();
            $table->string('image_path')->after('body')->nullable(false)->change();
        });
    }
}
