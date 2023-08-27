<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->bigIncrements('appointment_id');

            /*
             * Foreign key to team_member table.
             */
            $table->unsignedBigInteger('team_member_id');
            $table->foreign('team_member_id', 'fk_appointment__team_member')
                ->references('team_member_id')->on('team_member');

            $table->datetime('appointment_date_time');

            $table->string('applicant_name');
            $table->string('applicant_phone');
            $table->string('applicant_description');

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
        Schema::dropIfExists('appointment');
    }
}
