<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->bigIncrements('todo_id');

            $table->string('title');
            $table->string('description')->nullable();
            $table->string('status');

            /*
             * Foreign key to users table.
             *
             * User which creates the record.
             */
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id', 'fk_todo__users')
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
        Schema::dropIfExists('todo');
    }
}
