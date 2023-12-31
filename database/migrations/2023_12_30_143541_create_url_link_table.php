<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_link', function (Blueprint $table) {
            $table->bigIncrements('url_link_id');

            $table->string('url');
            $table->string('description');

            /*
             * Foreign key to users table.
             */
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id', 'fk_url_link__users')
                ->references('id')->on('users');

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
        Schema::dropIfExists('url_link');
    }
}
