<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWebpageContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webpage_content', function (Blueprint $table) {
            $table->dropColumn('webpage_content_type');
            $table->dropColumn('content');

            $table->text('title')->after('position');
            $table->text('body')->after('title');
            $table->string('image_path')->after('body');

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
            $table->string('webpage_content_type');
            $table->text('content');

            $table->dropColumn('title');
            $table->dropColumn('body');
            $table->dropColumn('image_path');
        });
    }
}
