<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseAdditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_addition', function (Blueprint $table) {
            $table->bigIncrements('purchase_addition_id');

            /*
             * Foreign key to purchase table.
             */
            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id', 'fk_purchase_addition__purchase')
                ->references('purchase_id')->on('purchase');

            /*
             * Foreign key to purchase_addition_heading table.
             */
            $table->unsignedBigInteger('purchase_addition_heading_id');
            $table->foreign('purchase_addition_heading_id', 'fk_purchase_addition__purchase_addition_heading')
                ->references('purchase_addition_heading_id')->on('purchase_addition_heading');

            $table->integer('amount');

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
        Schema::dropIfExists('purchase_addition');
    }
}
