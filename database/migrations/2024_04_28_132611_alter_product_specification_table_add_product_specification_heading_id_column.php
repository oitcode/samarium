<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductSpecificationTableAddProductSpecificationHeadingIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_specification', function (Blueprint $table) {
            /*
             * Foreign key to product_specification_heading table.
             *
             */
            $table->unsignedBigInteger('product_specification_heading_id')->nullable();
            $table->foreign('product_specification_heading_id', 'fk_product_specification__product_specification_heading')
                ->references('product_specification_heading_id')->on('product_specification_heading');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_specification', function (Blueprint $table) {
            $table->dropForeign('fk_product_specification__product_specification_heading');
            $table->dropColumn('product_specification_heading_id');
        });
    }
}
