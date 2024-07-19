<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducInstitutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educ_institution', function (Blueprint $table) {
            $table->bigIncrements('educ_institution_id');

            $table->string('name');
            $table->string('country');
            $table->string('institution_type');

            /*
             * Foreign key to users table.
             *
             * User which creates the record.
             */
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id', 'fk_educ_institution__users')
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
        Schema::dropIfExists('educ_institution');
    }
}
