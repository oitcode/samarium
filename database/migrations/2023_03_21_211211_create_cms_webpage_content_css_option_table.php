<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsWebpageContentCssOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_webpage_content_css_option', function (Blueprint $table) {
            $table->bigIncrements('cms_webpage_content_css_option_id');

            /*
             * Foreign key to webpage_content table.
             */
            $table->unsignedBigInteger('webpage_content_id');
            $table->foreign('webpage_content_id', 'fk_cms_webpage_content_css_option__webpage_content')
                ->references('webpage_content_id')->on('webpage_content');

            $table->string('option_name');
            $table->string('option_value');

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
        Schema::dropIfExists('cms_webpage_content_css_option');
    }
}
