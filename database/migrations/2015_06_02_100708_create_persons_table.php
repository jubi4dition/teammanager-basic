<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('firstname', 32);
            $table->string('lastname', 32);
            $table->enum('gender', ['unknown', 'male', 'female']);
            $table->date('birthdate')->default('0000-00-00');
            $table->string('email', 64);
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
        Schema::drop('persons');
    }

}
