<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserJoinActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('activity_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('activities')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(array('user_id', 'activity_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_activities');
    }
}
