<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentFileUserGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_file__user_group', function (Blueprint $table) {
            $table->bigIncrements('document_file__user_group_id');

            $table->bigInteger('document_file_id');
            $table->bigInteger('user_group_id');

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
        Schema::table('document_file__user_group', function (Blueprint $table) {
            Schema::dropIfExists('document_file__user_group');
        });
    }
}
