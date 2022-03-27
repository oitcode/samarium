<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_payment', function (Blueprint $table) {
            $table->bigIncrements('expense_payment_id');

            $table->date('payment_date');

            /*
             * Foreign key to expense table.
             */
            $table->unsignedBigInteger('expense_id');
            $table->foreign('expense_id', 'fk_expense_payment__expense')
                ->references('expense_id')->on('expense');

            /*
             * Foreign key to expense_payment_type table.
             */
            $table->unsignedBigInteger('expense_payment_type_id');
            $table->foreign('expense_payment_type_id', 'fk_expense_payment__expense_payment_type')
                ->references('expense_payment_type_id')->on('expense_payment_type');


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
        Schema::dropIfExists('expense_payment');
    }
}
