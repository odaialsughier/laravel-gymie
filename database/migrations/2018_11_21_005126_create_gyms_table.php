<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->integer('phone');
            $table->enum('status' , [ 'enabled' , 'disabled'])->default('enabled');
            $table->enum('deleted' , [ 'yes' , 'no'])->default('no');
            $table->integer('deleted_by');
            $table->datetime('deletion_date');
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
        Schema::drop('gyms');
    }
}
