<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_info', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('nickname');
            $table->string('gendor');
            $table->integer('age');
            $table->string('birthday');
            $table->string('location');
            $table->string('hometown');
            $table->string('occupation');
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
        Schema::drop('individual_info');
    }
}
