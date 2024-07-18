<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_comment', function (Blueprint $table) {
            $table->bigIncrements('customer_comment_id');

            $table->text('comment_text');
            $table->string('file_path')->nullable();

            /*
             * Foreign key to customer table.
             *
             */
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'fk_customer_comment__customer')
                ->references('customer_id')->on('customer');

            /*
             * Foreign key to users table.
             *
             * User which creates the record.
             */
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id', 'fk_customer_comment__users')
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
        Schema::dropIfExists('customer_comment');
    }
}
