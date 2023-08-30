<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMemberAppointmentAvailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_member_appointment_availability', function (Blueprint $table) {
            $table->bigIncrements('team_member_appointment_availability_id');

            /*
             * Foreign key to team_member table.
             */
            $table->unsignedBigInteger('team_member_id');
            $table->foreign('team_member_id', 'fk_team_member_appointment_availability__team_member')
                ->references('team_member_id')->on('team_member');

            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');

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
        Schema::dropIfExists('team_member_appointment_availability');
    }
}
