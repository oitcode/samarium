<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductTableAddGalleryIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            /*
             * Foreign key to gallery table.
             */
            $table->unsignedBigInteger('gallery_id')->nullable();
            $table->foreign('gallery_id', 'fk_product__gallery')
                ->references('gallery_id')->on('gallery');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('fk_product__gallery');
            $table->dropColumn('gallery_id');
        });
    }
}
