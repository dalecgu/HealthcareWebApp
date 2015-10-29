<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreeMomentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agree_moments', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('moment_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('moment_id')->references('id')->on('moments')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(array('user_id', 'moment_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agree_moments');
    }
}
