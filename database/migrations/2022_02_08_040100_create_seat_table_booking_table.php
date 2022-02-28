<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatTableBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seat_table_booking', function (Blueprint $table) {
            $table->bigIncrements('seat_table_booking_id');

            /*
             * Foreign key to seat_table table.
             */
            $table->unsignedBigInteger('seat_table_id');
            $table->foreign('seat_table_id', 'fk_seat_table_booking__seat_table')
                ->references('seat_table_id')->on('seat_table');

            $table->string('status');
            $table->date('booking_date');

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
        Schema::dropIfExists('seat_table_booking');
    }
}
