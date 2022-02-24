<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatTableBookingItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seat_table_booking_item', function (Blueprint $table) {
            $table->bigIncrements('seat_table_booking_item_id');

            /*
             * Foreign key to seat_table_booking table.
             */
            $table->unsignedBigInteger('seat_table_booking_id');
            $table->foreign('seat_table_booking_id', 'fk_seat_table_booking_item__seat_table_booking')
                ->references('seat_table_booking_id')->on('seat_table_booking');

            /*
             * Foreign key to product table.
             */
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'fk_seat_table_booking_item__product')
                ->references('product_id')->on('product');

            $table->integer('quantity');

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
        Schema::dropIfExists('seat_table_booking_item');
    }
}
