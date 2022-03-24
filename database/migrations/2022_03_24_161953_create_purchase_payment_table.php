<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_payment', function (Blueprint $table) {
            $table->bigIncrements('purchase_payment_id');

            $table->date('payment_date');

            /*
             * Foreign key to purchase table.
             */
            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id', 'fk_purchase_payment__purchase')
                ->references('purchase_id')->on('purchase');

            /*
             * Foreign key to purchase_payment_type table.
             */
            $table->unsignedBigInteger('purchase_payment_type_id');
            $table->foreign('purchase_payment_type_id', 'fk_purchase_payment__purchase_payment_type')
                ->references('purchase_payment_type_id')->on('purchase_payment_type');


            $table->integer('amount');
            $table->string('deposited_by')->nullable();

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
        Schema::dropIfExists('purchase_payment');
    }
}
