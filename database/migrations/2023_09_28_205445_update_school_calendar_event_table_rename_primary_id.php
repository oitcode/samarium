<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSchoolCalendarEventTableRenamePrimaryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_calendar_event', function (Blueprint $table) {
            $table->renameColumn('school_calendar_id', 'school_calendar_event_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_calendar_event', function (Blueprint $table) {
            $table->renameColumn('school_calendar_event_id', 'school_calendar_id');
        });
    }
}
