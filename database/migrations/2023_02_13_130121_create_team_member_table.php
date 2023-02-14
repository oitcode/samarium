<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_member', function (Blueprint $table) {
            $table->bigIncrements('team_member_id');

            $table->string('name');

            /*
             * Foreign key to team table.
             */
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id', 'fk_team_member__team')
                ->references('team_id')->on('team');

            $table->string('image_path')->nullable() ;
            $table->string('phone')->nullable() ;
            $table->string('email')->nullable();
            $table->string('comment')->nullable();

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
        Schema::dropIfExists('team_member');
    }
}
