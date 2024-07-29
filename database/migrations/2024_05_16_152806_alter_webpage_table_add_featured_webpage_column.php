<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterWebpageTableAddFeaturedWebpageColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webpage', function (Blueprint $table) {
            $table->string('featured_webpage')->default('no')->after('is_post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webpage', function (Blueprint $table) {
            $table->dropColumn('featured_webpage');
        });
    }
}
