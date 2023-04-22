<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_info', function (Blueprint $table) {
            $table->bigIncrements('company_info_id');

            /*
             * Foreign key to company table.
             */
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id', 'fk_company_info__company')
                ->references('company_id')->on('company');

            $table->string('info_key');
            $table->string('info_value');

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
        Schema::dropIfExists('company_info');
    }
}
