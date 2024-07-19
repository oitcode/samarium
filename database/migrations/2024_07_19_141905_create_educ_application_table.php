<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educ_application', function (Blueprint $table) {
            $table->bigIncrements('educ_application_id');

            $table->string('status');

            /*
             * Foreign key to customer table.
             *
             */

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'fk_educ_application__customer')
                ->references('customer_id')->on('customer');

            /*
             * Foreign key to educ_institution_progarm table.
             *
             */

            $table->unsignedBigInteger('educ_institution_program_id');
            $table->foreign('educ_institution_program_id', 'fk_educ_application__educ_institution_program')
                ->references('educ_institution_program_id')->on('educ_institution_program');

            /*
             * Foreign key to users table.
             *
             * User which creates the record.
             */
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id', 'fk_educ_application__users')
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
        Schema::dropIfExists('educ_application');
    }
}
