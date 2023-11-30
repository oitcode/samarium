<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolCalendarEventCalendarGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_calendar_event__calendar_group', function (Blueprint $table) {
            $table->bigIncrements('school_calendar_event__calendar_group_id');

            $table->bigInteger('school_calendar_event_id');
            $table->bigInteger('calendar_group_id');

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
        Schema::dropIfExists('school_calendar_event__calendar_group');
    }
}
