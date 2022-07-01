<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbAccountTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ab_account_type', function (Blueprint $table) {
            $table->bigIncrements('ab_account_type_id');

            $table->string('name')->unique();

            /*
             * Foreign key to ab_account_type table.
             *
             * Parent ab_account_type of this ab_account_type.
             *
             * Yes, this table has a foreign key to
             * same table (itself). Remember any
             * ab_account_type can have a parent ab_account_type.
             * Ultimately at least one ab_account_type will have a null
             * foreign key! That is, it will be a top level
             * ab_account_type.
             *
             */
            $table->unsignedBigInteger('parent_ab_account_type_id')->nullable();
            $table->foreign('parent_ab_account_type_id', 'fk_ab_account_type__ab_account_type')
                ->references('ab_account_type_id')->on('ab_account_type');

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
        Schema::dropIfExists('ab_account_type');
    }
}
