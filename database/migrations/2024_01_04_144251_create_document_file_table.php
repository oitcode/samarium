<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_file', function (Blueprint $table) {
            $table->bigIncrements('document_file_id');

            $table->string('name');
            $table->string('file_path');
            $table->string('description');

            /*
             * Foreign key to users table.
             */
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id', 'fk_document_file__users')
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
        Schema::dropIfExists('document_file');
    }
}
