<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducInstitutionProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educ_institution_program', function (Blueprint $table) {
            $table->bigIncrements('educ_institution_program_id');

            $table->string('name');
            $table->string('program_type');

            /*
             * Foreign key to educ_institution table.
             *
             */
            $table->unsignedBigInteger('educ_institution_id');
            $table->foreign('educ_institution_id', 'fk_educ_institution_program__educ_institution')
                ->references('educ_institution_id')->on('educ_institution');

            /*
             * Foreign key to users table.
             *
             * User which creates the record.
             */
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id', 'fk_educ_institution_program__users')
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
        Schema::dropIfExists('educ_institution_program');
    }
}
