<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('nickname');
            $table->string('gendor');
            $table->integer('age');
            $table->string('location');
            $table->string('company');
            $table->string('description');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_info');
    }
}
